<?php
use Kirby\Cms\App as Kirby;
Kirby::plugin('upstream/og-image', [
	'sections' => [
		'og_image_preview' => require __DIR__ . '/sections/og_image_preview.php'
	],
    'routes' => [
        [
            'pattern' => '(:all)/og-image',
            'action' => function ($slug) {

                /* $background = imagecreatefrompng(__DIR__ . '/assets/background.png'); */
                /* imagecopyresampled(
                    $canvas,
                    $background,
                    0,
                    0,
                    0,
                    0,
                    imagesx($background),
                    imagesy($background),
                    imagesx($background),
                    imagesy($background)
                ); */

                // Inhalte
                $page = page($slug);
                if (!$page) {
                    return;
                }


                $title = $page->meta_title()->or($page->title()->or("Upstream"));
                // TODO: Untertitel in Abhängigkeit von Seitentyp
                $description = $page->meta_description() ?? $page->teaser();
                $description = $page->teaser();
                $template = $page->template();
                $type = $template == "artikel.interview" ? "Interview" : ($template == "artikel.community" ? "Community" : ($template == "glossar-begriff" ? "Glossar" : ($template == "artikel.newsletter" ? "Newsletter" : "Artikel")));

                // Schrift
                $fontRegular = __DIR__ . '/assets/fonts/Montserrat/static/Montserrat-Regular.ttf';
                $fontMedium = __DIR__ . '/assets/fonts/Montserrat/static/Montserrat-Medium.ttf';
                $fontBold = __DIR__ . '/assets/fonts/Montserrat/static/Montserrat-ExtraBold.ttf';
                $fontSizeBase = 100;
                $fontSizeSmall = $fontSizeBase * 0.5;
                $fontSizeRegular = $fontSizeBase * 0.8;
                $fontSizeMedium = $fontSizeBase * 1.2;
                $fontSizeLarge = $fontSizeBase * 1.5;

                // Setup: Canvas und Padding
                $width = 2400;
                $height = 1200;
                $paddingInline = floor(1.5 * $fontSizeBase);
                $paddingTop = floor(2 * $fontSizeBase);
                $canvas = imagecreatetruecolor($width, $height);

                function drawTextOnCanvas($canvas, $x, $y, $text, $fontSize, $fontFile, $textColor) {
                    return imagettftext(
                        $canvas,
                        $fontSize,      // Schriftgröße
                        0,              // Winkel
                        $x,             // x
                        $y,             // y
                        $textColor,     // Schriftfarbe
                        $fontFile,      // Schriftdatei
                        $text           // Text als String
                    );
                }

                // Colors
                $clrGreen999 = imagecolorallocate($canvas, 44, 72, 84);
                $clrGreen300 = imagecolorallocate($canvas, 185, 223, 223);
                $clrBrown300 = imagecolorallocate($canvas, 230, 225, 220);
                $clrBrown900 = imagecolorallocate($canvas, 91, 75, 60);
                $clrGreen999a = imagecolorallocatealpha($canvas, 44, 72, 84, 90);
                $clrGreen300a = imagecolorallocatealpha($canvas, 185, 223, 223, 60);
                $clrBrown300a = imagecolorallocatealpha($canvas, 230, 225, 220, 60);
                $clrBrown900a = imagecolorallocatealpha($canvas, 91, 75, 60, 60);

                // Setup: Hintergrund-Farbe und Schriftfarbe
                switch ($type) {
                    case "Artikel":
                        $backgroundColor = $clrGreen300a;
                        $textColor = $clrGreen999;
                        break;
                    case "Newsletter":
                        $backgroundColor = $clrGreen300a;
                        $textColor = $clrGreen999;
                        break;
                    case "Interview":
                        $backgroundColor = $clrGreen999a;
                        $textColor = $clrGreen300;
                        break;
                    case "Glossar":
                        $backgroundColor = $clrBrown300a;
                        $textColor = $clrBrown900;
                        break;
                    default:
                        $backgroundColor = imagecolorallocate($canvas, 185, 223, 223);
                        $textColor = imagecolorallocate($canvas, 91, 75, 60);
                }


                // Hintergrund zeichnen
                imagefill($canvas, 0, 0, $backgroundColor);

                // Wenn Cover-Image vorhanden, in den Hintergrund legen
                if($thumb = $page->images()->template('cover')->first()) {
                    if($thumb->extension() == 'png') {
                        $thumbImage = imagecreatefrompng($thumb->realpath());
                    } else {
                        $thumbImage = imagecreatefromjpeg($thumb->realpath());
                    }
                    if ($thumbImage) {
                        imagefilter($thumbImage, IMG_FILTER_GRAYSCALE);
                        imagelayereffect($canvas, IMG_EFFECT_OVERLAY);
                        // TODO: richtiger aspect-ratio
                        imagecopyresized($canvas, $thumbImage, 0, 0, 0, 0, $width, $height, $thumb->width(), $thumb->height());
                    }
                }

                // Logo einfügen
                $iconWidth = 80;
                if($logo = imagecreatefrompng(__DIR__ . '/assets/logo_new.png')) {
                    imagelayereffect($canvas, IMG_EFFECT_NORMAL);
                    imagefilter($logo, IMG_FILTER_SMOOTH, 99);
                    imagecopyresized($canvas, $logo, $paddingInline, $paddingTop, 0, 0, floor($fontSizeSmall * 8 / 7), $fontSizeSmall, 400, 350);
                }

                // Breadcrumb zeichnen
                $text = wordwrap("Upstream > " . $type, 40, "\n", true);
                $y = $paddingTop + $fontSizeSmall;

                drawTextOnCanvas($canvas, $paddingInline + $iconWidth, $y, $text, $fontSizeSmall, $fontRegular, $textColor);

                $getBox = imagettfbbox(
                    $fontSizeSmall,
                    0,
                    $fontRegular,
                    $text
                );
                /* [$breadWidth, $breadHeight] = drawTextOnCanvas($canvas, $paddingInline, $y = $paddingTop + $fontSizeSmall, $text, $fontSizeSmall, $fontRegular, $textColor); */
                /* $text = "h: " . $breadHeight . "; w: " . $breadWidth;
                $text = "1: " . $getBox[1] . "; 7: " . $getBox[7]; */


                // Titel zeichnen
                function getTitleHeight($fontSize, $textbreak, $fontFile, $text) {
                    $getTitleBox = imagettfbbox(
                        $fontSize,
                        0,
                        $fontFile,
                        wordwrap($text, $textbreak, "\n", true)
                    );
                    return $titleHeight = $getTitleBox[1] - $getTitleBox[7];
                }

                // Versuche Fontsize Large
                $fontSize = $fontSizeLarge;
                $textbreak = 17;
                if (getTitleHeight($fontSize, $textbreak, $fontBold, $title) > 900) {
                    $fontSize = $fontSizeMedium;
                    $textbreak = 21;
                    if (getTitleHeight($fontSize, $textbreak, $fontBold, $title) > 750) {
                        $fontSize = $fontSizeBase;
                        $textbreak = 25;
                    }
                }


                $breadcrumbHeight = $getBox[1] - $getBox[7];
                $text = wordwrap($title, $textbreak, "\n", true);
                $y = $y + $breadcrumbHeight + $fontSize;
                //$text = $titleHeight + $y + $paddingTop;
                // $breadcrumbHeight = $fontSizeSmall * 2;
                // $fontSize = floor(1.5 * $fontSizeBase);
                // $lineHeight = floor(1.5 * $fontSize);
                // $yOffset = $fontSizeBase;
                // $x = $paddingInline;
                //$y = $y + floor($breadcrumbHeight + $lineHeight / 2);

                [$titleX, $titleY] = drawTextOnCanvas($canvas, $paddingInline, $y, $text, $fontSize, $fontBold, $textColor);

                // Zeichne Beschreibung
                if($titleY <= 700) {
                    $description = $page->question()->or($page->meta_description()->or($page->teaser()->excerpt(80)));
                    $text = wordwrap($description, 35, "\n", true);
                    $y = $titleY + $fontSizeRegular * 2;
                    drawTextOnCanvas($canvas, $paddingInline, $y, $text, $fontSizeRegular, $fontMedium, $textColor);
                }




                $x = $getBox[0] + ($width / 2) - ($getBox[4] / 2) - 25;

                // Branding
                /* $x = $width-$paddingInline-400;
                $y = $height-$paddingTop; */
                /* imagettftext(
                    $canvas,
                    $fontSize / 2,
                    0,
                    $x,
                    $y,
                    $textColor,
                    $fontBold,
                    "Upstream"
                ); */



                // Render
                ob_start();
                imagepng($canvas);
                $body = ob_get_clean();
                imagedestroy($canvas);

                return new Response($body, 'image/png');
            }
        ],
    ]
]);
