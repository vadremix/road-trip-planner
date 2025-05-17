#!/bin/sh
set -e

# Drop privileges (recursively)
if [ "$(id -u)" = "0" ] && [ "$UID" != "0" ]; then
  chown -R "${UID}:${GID}" /.symfony5 || true
  exec gosu "${UID}:${GID}" "$0" "$@"
else
  exec "$@"
fi
