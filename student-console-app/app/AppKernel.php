<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
        );

        // ...
    }

    // ...
}
?>
