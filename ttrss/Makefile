REPO = ewgb/ttrss
VERSION = 20170331
TTRSS_COMMIT = 78fee22415bb1656700551a1cc8895cb714b5334
THEME_FEEDLY_COMMIT = 56a46c82da7b89a8cdc5d78f171c48fe4b8e6b75


all: build

build:
	docker build \
		--pull \
		--rm \
		--build-arg TTRSS_COMMIT=$(TTRSS_COMMIT) \
		--build-arg THEME_FEEDLY_COMMIT=$(THEME_FEEDLY_COMMIT) \
		-t $(REPO):$(VERSION) .

release:
	docker push $(REPO):$(VERSION)
	docker tag $(REPO):$(VERSION) $(REPO):latest
	docker push $(REPO):latest
