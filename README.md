# Test case for issue https://github.com/symfony/symfony/issues/61560

This project is a small setup to test the issue described [here](https://github.com/symfony/symfony/issues/61560).

## How to test

- Run containers with ```docker compose up -d``` (Adapt the compose.yml file if needed)
- Check that traefik is running. Go to `http://traefik.localhost`
- To test url generation : go to `http://localhost/app1/test`
- To test form_login forward use case: try to reach `http://localhost/app1/admin`

For each case, you should see that Symfony generates url like `http://localhost/app1/app1/...` by duplicating the X_Forwarded_Prefix
