branch=$(git branch | sed -n -e 's/^\* \(.*\)/\1/p')
echo "Current branch is ${branch}"

echo "Updating..."
git pull origin ${branch}
php bin/console doctrine:schema:update --force --dump-sql
echo "Clearing dev cache..."
php bin/console cache:clear --no-warmup
echo "Clearing prod cache..."
php bin/console cache:clear --no-warmup --env=prod
php bin/console cache:warmup --env=prod