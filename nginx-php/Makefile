REPO = ewgb/nginx-php
PHP5_TAG = php5.6
PHP7_TAG = php7.0


all: build-php7 build-php5

build-php7:
	docker build \
		--pull \
		--rm \
		-t $(REPO):$(PHP7_TAG) php7

build-php5:
	docker build \
		--pull \
		--rm \
		-t $(REPO):$(PHP5_TAG) php5

release-php5:
	docker push $(REPO):$(PHP5_TAG)

release-php7:
	docker push $(REPO):$(PHP7_TAG)

release: release-php5 release-php7
