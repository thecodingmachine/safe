if [ ! -d "doc-en" ]; then
  mkdir doc-en
  cd doc-en
  git clone https://github.com/salathe/phpdoc-base doc-base
  git clone https://github.com/php/doc-en en
else
  cd doc-en/en
  git pull
  cd ../doc-base
  git pull
fi