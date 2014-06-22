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
	for file in ${DIST_ASSETS}; do cp $$file dist/$${file#public/}; done
	cd ./dist && git add --all . && git commit -am "rebuilding presentation" && git push

.PHONY: clean serve ctags concat develop snapshot

