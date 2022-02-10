## Project for develop WP-themes

```

create new repository on github
mkdir folder in local machine
git init in local machine
git clone git@github.com:MarchenkoOlexandr/webwp.git
create files:
Jenkinsfile
main.tf
user_data.sh
variables.tf

```

## On Jenkins create pipeline for this project

```
Jenkins do next jobs:
take Jenkinsfile from Github
create new instance with docker and docker-compose
Create new folder for project
take files, test files, create artefact, put artefact, unpack and deploy files from artefact

```
##