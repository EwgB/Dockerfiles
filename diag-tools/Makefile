REPO = lightcode/diag-tools

all: build

build:
	docker build \
		--pull \
		--rm \
		-t $(REPO):latest .

release:
	docker push $(REPO):latest
