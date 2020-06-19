<!DOCTYPE html>
<html>
    <head>
        <meta name='viewport' content='width=320,initial-scale=1,user-scalable=0'>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="author" content="Johan Groenen (c) 2020">
        
        <link rel='image_src' href='<?=$data['basics']['picture']?>'/>
        <link rel='shortcut icon' type='image/png' href='<?=$data['basics']['picture']?>'>
        
        <title><?=$data['basics']['name']?></title>
        <meta name="title" content="<?=$data['basics']['name']?> <?=$data['basics']['label']?>">
        <meta name="description" content="<?=$data['basics']['summary']?>">
        <meta name="keywords" content=""> <!-- FIXME keywords -->

        <meta property='og:url' content=''> <!-- FIXME url -->
        <meta property='og:title' name='title' content="<?=$data['basics']['name']?> <?=$data['basics']['label']?>">
        <meta property='og:description' name='description' content="<?=$data['basics']['summary']?>">
        <meta property='og:image' content="<?=$data['basics']['picture']?>">
        <link rel='image_src' href="<?=$data['basics']['picture']?>"/>
        <meta name='keywords' content="
            <? foreach ($data['skills'] as $skill) { ?>
                <?=$skill['name']?>,
            <? } ?>
        ">
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:username" content=""> <!-- FIXME twitter handle -->
        <meta name="twitter:title" content="<?=$data['basics']['name']?> <?=$data['basics']['label']?>">
        <meta name="twitter:description" content="<?=$data['basics']['summary']?>">
        <meta name="twitter:image:src" content="<?=$data['basics']['picture']?>">
        
        <link href='https://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="vcard" itemscope itemtype="https://schema.org/Person">
        <div class="showoff no-mobile no-print" style="background-image: url(<?=$data['basics']['picture']?>)"></div>
        <div class="wrapper">
            <header>
                <h1 class="fn" itemprop="name"><?=$data['basics']['name']?></h1>
                <h2 itemprop="jobTitle" class="no-print" itemprop="title"><?=$data['basics']['label']?></h2>
                <img itemprop="image" class="photo no-print" src="<?=$data['basics']['picture']?>" style="max-width: 199px; max-height: 199px" alt="Foto van <?=$data['basics']['name']?>">
                <h3 itemprop="description" class="no-print"><?=$data['basics']['summary']?> <i><?=$data['quote']?></i></h3>
                <section class="contact">
                    <div class="adr" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <img class="icon" src="img/home.png" alt="Adres: " style="float: left">
                        <p style="float: left; margin: 0 4px; padding-top: 6px">
                            <span class="street-address" itemprop="streetAddress"><?=$data['basics']['location']['address']?></span><br>
                            <span class="postal-code" itemprop="postalCode"><?=$data['basics']['location']['postalCode']?></span>
                            <span class="locality" itemprop="addressLocality"><?=$data['basics']['location']['city']?></span>
                        </p>
                        <p style="clear: both"></p>
                    </div>
                    <p>
                        <img class="icon" src="img/mobile.png" alt="Telefoon: ">
                        <a class="tel" itemprop="telephone" href="tel:<?=$data['basics']['phone']?>"><?=$data['basics']['phone']?></a>
                    </p>
                    <p>
                        <img class="icon" src="img/email.png" alt="E-mail: ">
                        <a class="email" itemprop="email" href="mailto:<?=$data['basics']['email']?>"><?=$data['basics']['email']?></a>
                    </p>
                    <p>
                        <img class="icon" src="img/connected.png" alt="LinkedIn: ">
                        <span style="display: inline-block; width: 210px; vertical-align: top; padding-top: 6px">
                            <? foreach ($data['basics']['profiles'] as $profile) { ?>
                                <a style="line-height: 1.4em" href="<?=$profile['url']?>"><?=str_replace(['https://', 'www.'], ' ', $profile['url'])?></a>
                            <? } ?>
                        </span>
                    </p>
                    <p class="no-print no-mobile">
                        <a href="javascript:window.print()"><img class="icon" src="img/print.png" alt="Printen: ">print deze pagina</a>
                    </p>
                    <p>
                        <img class="icon" src="img/line-globe.png" alt="Website: ">
                        <a class="url" itemprop="url" href="<?=$data['basics']['website']?>"><?=str_replace(['https://', 'www.'], ' ', $data['basics']['website'])?></a>
                    </p>
                </section>
                <img class="qr" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?=$data['basics']['website']?>" alt="">
            </header>
            <main>
                <section>
                    <h1><img class="icon" src="img/briefcase.png" alt="">Werk</h1>
                    <? foreach ($data['work'] as $item) { ?>
                        <section class="ervaring">
                            <header>
                                <h2 itemprop="affiliation"><?=$item['company']?></h2>
                                <h1><?=$item['position']?></h1>
                                <p><?=$item['startDate']?> - <?=$item['endDate']?></p>
                                <p><a href="<?=$item['website']?>"><?=$item['website']?></a></p>
                            </header>
                            <main>
                                <p><i><?=$item['motto']?></i></p>
                                <p><?=$item['summary']?></p>
                            </main>
                            <div class="clear"></div>
                        </section>
                    <? } ?>
                </section>

                <section>
                    <h1><img class="icon" src="img/briefcase.png" alt="">Vrijwilligerswerk</h1>
                    <? foreach ($data['volunteer'] as $item) { ?><section class="ervaring">
                            <header>
                                <h2 itemprop="affiliation"><?=$item['organization']?></h2>
                                <h1><?=$item['position']?></h1>
                                <p><?=$item['startDate']?> - <?=$item['endDate']?></p>
                                <p><a href="<?=$item['website']?>"><?=$item['website']?></a></p>
                            </header>
                            <main>
                                <p><i><?=$item['motto']?></i></p>
                                <p><?=$item['summary']?></p>
                            </main>
                            <div class="clear"></div>
                        </section>
                    <? } ?>
                </section>
                
                <section>
                    <h1><img class="icon" src="img/bookmark.png" alt="">Opleiding</h1>
                    <? foreach ($data['education'] as $item) { ?><section class="ervaring">
                            <header>
                                <h2 itemprop="affiliation"><?=$item['institution']?></h2>
                                <h1><?=$item['area']?></h1>
                                <p><?=$item['startDate']?> - <?=$item['endDate']?></p>
                                <p><a href="<?=$item['website']?>"><?=$item['website']?></a></p>
                            </header>
                            <main>
                                <p><i><?=$item['studyType']?></i></p>
                                <p><?=$item['summary']?></p>
                            </main>
                            <div class="clear"></div>
                        </section>
                    <? } ?>
                </section>
                
                <section>
                    <h1><img class="icon" src="img/configuration02.png" alt="">Skills</h1>
                    <p>
                        <ul>
                            <? foreach ($data['skills'] as $skill) { ?>
                            <li class="tag"><?=$skill['name']?></li>
                                <? foreach ($skill['keywords'] as $keyword) { ?>
                                    <li class="tag"><?=$keyword?></li>
                                <? } ?>
                            <? } ?>
                        </ul>
                    </p>
                </section>
                <section class="no-print">
                    <h1><img class="icon" src="img/next-item.png" alt="">Overige</h1>
                    <p>
                        <ul>
                            {% for link in site.data.resume._links %}
                            <li><a href="{{ link.url }}">{{ link.title }}</a>, {{ link.description }}.</li>
                            {% endfor %}
                        </ul>
                    </p>
                </section>
            </main>
        </div>
        <footer style="background: #aaa; clear: both" class="no-print">
            <div class="wrapper" style="color: #fff; line-height: 1.4em; padding: 1em">
                CC-BY JOHAN GROENEN 2020<br>
                https://jsonresume.org/schema/<br>
                http://microformats.org/wiki/hcard<br>
                schema.org<br>
            </div>
        </footer>
    </body>
</html>
