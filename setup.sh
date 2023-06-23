#!/bin/bash

if [[ $# -eq 0 ]] ; then
    echo 'Please provide the parameters for the script | local or develop'
    exit 1
fi

$task=$1

if [[ $task == "develop"]]; then
    echo "Performing develop script for the development environment."

    # Copy the nginx.conf.prod to nginx.conf
    cp nginx/nginx.conf.prod nginx/nginx.conf

    # Copy the .env.prod to .env
    cp api/.env.prod api/.env
    cp storefront/.env.prod storefront/.env
    cp backoffice/.env.prod backoffice/.env

elif [[ $task == "local"]]; then
    echo "Performing local script for the local environment."

    # Copy the nginx.conf.example to nginx.conf
    cp nginx/nginx.conf.example nginx/nginx.conf

    # Copy the .env.example to .env
    cp api/.env.example api/.env
    cp storefront/.env.example storefront/.env
    cp backoffice/.env.example backoffice/.env

else
    echo "Please provide the correct parameters for the script | local or develop"
    exit 1
fi

echo "Task $task completed."