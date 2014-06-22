concat:
	@echo concatenating assets
	php build.php

clean:
	@echo cleaning old assets
	rm -f public/css/dist.css public/js/dist.js

ctags:
	@echo generating ctags
	find . -name '*.php' -exec ctags {} +

serve:
	@echo starting the artisan server
	php artisan serve

develop: concat serve

snapshot:
	./snapshot.bash
	cd ./dist && git add --all . && git commit -am "rebuilding presentation" && git push

