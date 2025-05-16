#!/bin/bash

# Determine project root (directory where the script is run)
PROJECT_ROOT="$(pwd)"

# Set .env path
ENV_FILE="$PROJECT_ROOT/.env"

# Get UID and GID
USER_ID=$(id -u)
GROUP_ID=$(id -g)

# Write .env file
echo "UID=$USER_ID" > "$ENV_FILE"
echo "GID=$GROUP_ID" >> "$ENV_FILE"

echo "Created .env with:"
cat "$ENV_FILE"