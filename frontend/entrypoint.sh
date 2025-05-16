#!/bin/sh
set -e

# Ensure user owns node_modules (recursively)
if [ "$(id -u)" = "0" ] && [ "$UID" != "0" ]; then
  chown -R "${UID}:${GID}" /app/node_modules || true
  exec gosu "${UID}:${GID}" "$0" "$@"
else
  exec "$@"
fi
