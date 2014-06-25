JS_DIST=public/js/dist.js
CSS_DIST=public/css/dist.css

concat:
	@echo concatenating assets
	php build.php

clean:
	@echo cleaning old assets
	rm -f public/css/dist.css public/js/dist.js

tags:
	@echo generating ctags
	find . -name '*.php' -exec ctags {} +

serve:
	@echo starting the artisan server
	php artisan serve

develop: concat serve

snapshot: clean concat
	php artisan snapshot GET / > dist/index.html
	mkdir -pv dist/js dist/css dist/img
	cp ${JS_DIST} dist/js/
	cp ${CSS_DIST} dist/css/
	cp public/img/* dist/img/
	cd ./dist && git add --all . && git commit -am "rebuilding presentation" && git push

.PHONY: clean serve ctags concat develop snapshot

