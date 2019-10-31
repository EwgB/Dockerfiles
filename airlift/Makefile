REPO = ewgb/airlift
VERSION = 0.3.1

all: build

build:
	docker build \
		--pull \
		--rm \
		--build-arg VERSION=$(VERSION) \
		-t $(REPO):$(VERSION) .

release:
	docker push $(REPO):$(VERSION)
	docker tag $(REPO):$(VERSION) $(REPO):latest
	docker push $(REPO):latest
