# php-utils
A list of reusable functions to use across PHP projects, with Test cases

## Testing With PEST

### Installing PEST

```bash
$ composer require pestphp/pest --dev --with-all-dependencies

$ vendor/bin/pest --init
```

The `init` command will create the following files & folders as mentioned in the output:

```bash
   DONE  Created `tests` directory.
   DONE  Created `phpunit.xml` file.
   DONE  Created `tests/Pest.php` file.
   DONE  Created `tests/ExampleTest.php` file.

   DONE  Pest initialised.
```

### Test Code Coverage aka PCOV

- We'll use [PCOV](https://github.com/krakjoe/pcov)

#### Installing PCOV
- Installation as per [guide here](https://github.com/krakjoe/pcov/blob/develop/INSTALL.md):
```bash
$ git clone https://github.com/krakjoe/pcov.git
$ cd pcov
$ phpize
$ ./configure --enable-pcov
$ make
$ make test
$ make install
```

#### Enabling PCOV

1) Note the `/path/to/the/pcov.so` on your CLI just after the executing the `make install` command
2) Add the below on your CLI's php.ini (since we are using cli and not web)
```ini
[pcov]
extension=/usr/lib/php/20210902/pcov.so
pcov.enabled = 1
```

For list of values to customise in `php.ini`, see [this doc here](https://github.com/krakjoe/pcov/blob/develop/README.md#configuration)

### Executing the Test Coverage:

```
$ vendor/bin/pest --coverage
```

#### With report format

```
$ vendor/bin/pest --coverage --testdox
```


## References & Recommended Resources

- https://github.com/krakjoe/pcov/
- https://pestphp.com/docs/coverage


