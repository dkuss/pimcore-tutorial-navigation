<ul class="nav navbar-nav navbar-right">
    <?php foreach ($this->container as $page) { ?>
        <?php /* @var $page Zend\Navigation\Page\Mvc */ ?>
        <?php // here need to manually check for ACL conditions ?>
        <?php if (!$page->isVisible() || !$this->navigation()->accept($page)) { continue; } ?>
        <?php $hasChildren = $page->hasPages(); ?>
        <?php $isActive = $page->isActive(); ?>
        <?php if (!$hasChildren) { ?>
            <li class="<?php echo $isActive ? 'active' : ''; ?>">
                <a href="<?= $page->getHref() ?>" class="<?php echo $isActive ? 'active' : ''; ?>">
                    <?= $page->getLabel() ?>
                </a>
            </li>
        <?php } else { ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $page->getLabel() ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <?php foreach ($page->getPages() as $child) { etPages?>
                    <?php if(!$child->isVisible() || !$this->navigation()->accept($child)) { continue; } ?>
                    <li>
                        <a href="<?= $child->getHref() ?>">
                            <?= $child->getLabel() ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
    <?php } ?>
</ul>

<style>
    .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
        color: #fff;
        background-color: #fed136;
        border-radius: 3px;
    }
    .dropdown-menu {
        background-color: #fed136;
        color: #fff;
    }
</style>