start:
	docker compose up -d
	symfony serve:start -d
	if [ -f "package.json" ]; then \
          npm install && npm run dev; \
	fi