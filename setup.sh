#!/bin/bash

if [[ $# -eq 0 ]]; then
    echo "Please provide the parameters for the script: 'local' or 'develop'."
    exit 1
fi

task=$1

if [[ $task == "develop" ]]; then
    echo "Performing the 'develop' script for the development environment."

    # Copy nginx.conf.prod to nginx.conf
    if cp nginx/nginx.conf.prod nginx/nginx.conf; then
        echo "Copied nginx.conf.prod to nginx.conf successfully."
    else
        echo "Failed to copy nginx.conf.prod to nginx.conf."
        exit 1
    fi

    # Copy .env.prod to .env
    if cp api/.env.prod api/.env &&
       cp storefront/.env.prod storefront/.env &&
       cp backoffice/.env.prod backoffice/.env; then
        echo "Copied .env.prod to .env files successfully."
    else
        echo "Failed to copy .env.prod to .env files."
        exit 1
    fi

elif [[ $task == "local" ]]; then
    echo "Performing the 'local' script for the local environment."

    # Copy nginx.conf.example to nginx.conf
    if cp nginx/nginx.conf.example nginx/nginx.conf; then
        echo "Copied nginx.conf.example to nginx.conf successfully."
    else
        echo "Failed to copy nginx.conf.example to nginx.conf."
        exit 1
    fi

    # Copy .env.example to .env
    if cp api/.env.example api/.env &&
       cp storefront/.env.example storefront/.env &&
       cp backoffice/.env.example backoffice/.env; then
        echo "Copied .env.example to .env files successfully."
    else
        echo "Failed to copy .env.example to .env files."
        exit 1
    fi

else
    echo "Please provide the correct parameters for the script: 'local' or 'develop'."
    exit 1
fi

echo "Task $task completed."