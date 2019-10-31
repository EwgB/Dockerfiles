REPO = ewgb/base-runit

all: build

build:
	docker build --pull --rm -t $(REPO) .

release:
	docker push $(REPO):latest
