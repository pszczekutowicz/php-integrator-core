<?php

namespace A;

class AncestorClass
{
    protected function ancestorMethod()
    {

    }
}

trait ParentTrait
{
    protected function parentTraitMethod()
    {

    }
}

class ParentClass extends AncestorClass
{
    use ParentTrait;

    public function __construct()
    {

    }

    protected function parentMethod()
    {

    }

    protected function ancestorMethod()
    {

    }
}

trait TestTrait
{
    public function traitMethod()
    {

    }

    abstract public function abstractMethod();
}

class ChildClass extends ParentClass
{
    use TestTrait;

    public function __construct(Foo $foo)
    {

    }

    protected function ancestorMethod()
    {

    }

    protected function parentTraitMethod(Foo $foo = null)
    {

    }

    public function parentMethod(Foo $foo = null)
    {

    }

    protected function traitMethod(Foo $foo = null)
    {

    }

    public function abstractMethod(Foo $foo = null)
    {

    }
}
