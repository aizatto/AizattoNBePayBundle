README
======

This library provides a way to interact with the NBePay Payment Gateway.

It provides:
* A service to easily generate the NBePay Payment Page URL
* A Doctrine Entity (NBePaymentTransaction) to log each transaction

### Service

<pre>
$url = $this->container->get('nbepay')->generateURL(array(
  'amount' => 1.00,
  'orderid' => 1,
  'bill_name' => 'John Doe',
  'bill_email' => 'example@example.com'
  'bill_desc' => 'Description',
  'country' => 'MY',
  'cur' => 'myr',
  'returnurl' => 'http://www.example.com',
));
</pre>


Installation
------------

### Install source code

You have two options to install the source code.

* deps file
* git submodules

#### Install via deps

Add into your deps file

<pre>
[AizattoNBePayBundle]
    git=http://github.com/aizatto/AizattoNBePayBundle.git
    target=/bundles/Aizatto/Bundle/NBePayBundle
</pre>

Execute vendor update script:

<pre>
php bin/vendors update
</pre>

#### Install via git submodules

Execute git submodule add command:

<pre>
git submodule add \
  http://github.com/aizatto/AizattoNBePayBundle.git \
  vendor/bundles/Aizatto/Bundle/NBePayBundle
</pre>

### Install into AppKernel

Add "Aizatto\Bundle\NBePayBundle\NBePayBundle()" to the list of bundles.

<pre>
public function registerBundles()
{
    $bundles = array(
        new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
        ...
        new Aizatto\Bundle\NBePayBundle\NBePayBundle();
    );
</pre>

### Install into autoload

Edit app/autoload.php, and add the register the namespace "Aizatto":

<pre>
$loader->registerNamespaces(array(
  'Aizatto' => __DIR__.'/../vendor/bundles',
))
</pre>
