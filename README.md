![Freelance Banner](https://s3.eu-central-1.amazonaws.com/static.expertcoder.io/github-banner/banner.png)

# BeforeAfterBundle

Symfony 2/3 Bundle. If you want some code to execute before or after every action in particular controller, this bundle provides a very simple way to do this.

### Installation

Add to composer
```
composer require expertcoder/before-after-bundle
```

Add to AppKernal.php

```
  public function registerBundles()
    {
        $bundles = [
            ....
            new ExpertCoder\BeforeAfterBundle\ExpertCoderBeforeAfterBundle(),
        ];
```

### Usage

In any controller, where you would like to have some code run before each action, simply have that controller implement ```ExpertCoder\BeforeAfterBundle\Other\ExecuteBeforeInterface```. Any code inside ```executeBefore()``` will run before the code inside the action method which is been invoked.

### Example

```
use ExpertCoder\BeforeAfterBundle\Other\ExecuteBeforeInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class DefaultController extends Controller implements ExecuteBeforeInterface
{
    public function executeBefore(FilterControllerEvent $event)
    {
        /* code here will execute before the code inside homeAction() */
    }

    /**
     * @Template()
     * @Route("/home")
     */
    public function homeAction(Request $request)
    {
        // ....

        return array();
    }

```

### TODO

* executeAfter functionallity

### Related Pages

* http://symfony.com/doc/current/cookbook/event_dispatcher/before_after_filters.html
* https://github.com/symfony/symfony/issues/1975
