# About This Repo
This is a personal repository filled with the interview questions I was asked and failed to answer.

### Why create something like this?
Practice makes perfect, giving myself some time to produce and perfect the solutions I am thinking of during the interviews.

### Composer
Tired of having the phar file onto your computer. Add this to your `~/bash_profile`.
```bash
alias composer="docker run --rm --interactive --tty --volume $PWD:/app composer/composer"
```

### Docker
I included the Docker environment that I use to run and test the solutions. Instructions to add to local on [DockerHub](https://hub.docker.com/r/pvillareal/php)
```bash
docker pull pvillareal/php:8.3-cli
```

