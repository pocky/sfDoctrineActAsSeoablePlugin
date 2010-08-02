# Information #

Pensé pour le CMS [peanut](http://github.com/pocky/peanut), ce plugin peut cependant fonctionner sur n'importe qu'elle projet symfony avec peu de modifications.

# Installation #

    $ git clone git://github.com/pocky/peanutSeoPlugin.git

# Activer le plugin #

__Dans config/ProjectConfiguration.class.php__

    $this->enablePlugins(array(
      [...],
      'peanutSeoPlugin',
    ));

__puis__
    $ php symfony doctrine:build --all
    $ php symfony cc

# Utilisation du behavior #

Un behavior Doctrine a été créé pour ce plug, il faudra donc rajouter dans votre fichier schema.yml un appel vers le behavior. Par exemple :

    peanutPage:
      actAs:
        Seoable: ~
      columns:
        [...]

Ce behavior ajoutera une colonne `seo_id` ainsi qu'une relation `peanutSeo`

# Ajouter le form de peanutSeo #

Dans le fichier Form.class.php de votre choix, ajouter :

    unset($this['seo_id']);
    $this->embedRelation('peanutSeo');

Cela permettra d'ajouter les champs du plugin.

# Utiliser le helper #

Dans le fichier `apps/frontend/templates/layout.php` par exemple, ajouter :

    <title>
      <?php if (!include_slot('title')): ?>
        peanut :: another CMS on symfony
      <?php endif; ?>
    </title>
    
    <meta name="description" content="<?php if(!include_slot('description', 'Le site de démonstration du CMS peanut')) { get_slot('description'); } ?>">
    <meta name="keywords" content="<?php if(!include_slot('keywords', 'peanut, symfony, cms')) { get_slot('keywords'); } ?>">   
    <meta name="robots" content="<?php if(!include_slot('robots', 'index, follow')) { get_slot('robots'); } ?>">
    <meta name="language" content="<?php if(!include_slot('language', 'fr_FR')) { get_slot('language'); } ?>">

Dans le fichier showSuccess.php de votre choix, ajouter :

__Attention dans le cas présent, l'objet en cours est `$peanut_page`__

    <?php use_helper('seo') ?>
    <?php seo('title', $peanut_page) ?>
    <?php seo('description', $peanut_page) ?>
    <?php seo('keywords', $peanut_page) ?>
    <?php seo('index', $peanut_page) ?>

# Complément à venir ! #

