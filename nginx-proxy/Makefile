REPO = ewgb/nginx-proxy
VERSION = 20170407


all: build

build:
	docker build \
		--pull \
		--rm \
		-t $(REPO):$(VERSION) .

release:
	docker push $(REPO):$(VERSION)
	docker tag $(REPO):$(VERSION) $(REPO):latest
	docker push $(REPO):latest
