<?php

/**
 * @var $this View
 */

use frontend\widgets\SocialNetworkWidget;
use noIT\core\helpers\Url;
use yii\web\View;

$this->title = Yii::t('app', 'genplan_txt');

?>
<section class="hero fix">
    <div class="hero__inner">

        <?= SocialNetworkWidget::widget(['view_type' => SocialNetworkWidget::VIEW_TYPE_SIDEBAR]) ?>

        <div class="genplan__wrap">

            <span class="title"><?= Yii::t('app', 'genplan_txt') ?></span>

            <div class="genplan__inner">

                <!-- IMAGE -->
                <div class="my-image-box">

                    <img class="my-image" src="/img/genplan-big.jpg">

                    <!-- SVG -->
                    <svg class="svg" version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1715 956"
                         preserveAspectRatio="xMidYMid slice">
                        <g class="svg__path">
                            <polygon class="svg__polygon"
                                     points="1008.08,435.54 955.16,678.94 774.31,676.1 748.83,488.19 "></polygon>
                            <image xlink:href="/img/choose-section-img.svg" x="700" y="400" height="103" width="140"
                                   class="svg__image"></image>
                            <path d="M955.16,678.94l52.92-243.4l-259.25,52.65l25.48,187.91L955.16,678.94z M1008.41,435.22l-53.05,243.97l-181.27-2.84 l-25.54-188.36L1008.41,435.22z"></path>
                            <path d="M955.36,679.19l53.05-243.97l-259.86,52.77l25.54,188.36L955.36,679.19z M1008.59,435.04c0.06,0.06,0.08,0.15,0.06,0.23 L955.6,679.24c-0.02,0.12-0.12,0.2-0.24,0.2l-181.27-2.84c-0.13,0-0.23-0.09-0.25-0.22L748.3,488.02 c-0.02-0.13,0.07-0.25,0.2-0.27l259.86-52.77C1008.44,434.96,1008.53,434.98,1008.59,435.04z"></path>
                        </g>
                        <a href="<?= Url::to(['genplan/view', 'section_id' => 151]) ?>">
                            <g class="svg__path">
                                <path class="svg__path"
                                      d="M828.4,603l-0.19,23.95l-2.23,0.17c-0.13,0.01-0.23,0.12-0.23,0.25v25.47h-2.97c-0.14,0-0.25,0.11-0.25,0.25 v9.59h-24.08v-7.7c0-0.12-0.08-0.22-0.19-0.24l-3.02-0.71l0.37-12.46c0-0.13-0.09-0.24-0.21-0.26l-3.19-0.53l-0.19-69.14 l33.92-0.19l-0.38,30.96c0,0.12,0.09,0.23,0.22,0.25L828.4,603z"></path>
                                <path d="M822.78,663.18H798.2c-0.14,0-0.25-0.11-0.25-0.25v-7.75l-3.03-0.71c-0.11-0.02-0.19-0.13-0.19-0.25l0.37-12.45 l-3.18-0.53c-0.12-0.02-0.21-0.13-0.21-0.25l-0.19-69.6c0-0.14,0.11-0.25,0.25-0.25l34.42-0.19c0.07,0,0.13,0.03,0.18,0.07 c0.04,0.05,0.07,0.12,0.07,0.18l-0.38,30.99l2.62,0.34c0.13,0.02,0.22,0.13,0.22,0.25l-0.19,24.4c0,0.13-0.1,0.24-0.23,0.25 l-2.23,0.17v25.49c0,0.14-0.11,0.25-0.25,0.25h-2.97v9.59C823.03,663.07,822.92,663.18,822.78,663.18z M798.2,662.93h24.58v-9.84 H826v-25.72l2.46-0.19l0.19-24.4l-2.84-0.37l0.38-31.21l-34.42,0.19l0.19,69.6l3.4,0.57l-0.38,12.67l3.22,0.75V662.93z"></path>
                                <path d="M798.26,654.74c0.11,0.02,0.19,0.12,0.19,0.24v7.7h24.08v-9.59c0-0.14,0.11-0.25,0.25-0.25h2.97v-25.47 c0-0.13,0.1-0.24,0.23-0.25l2.23-0.17L828.4,603l-2.62-0.34c-0.13-0.02-0.22-0.13-0.22-0.25l0.38-30.96l-33.92,0.19l0.19,69.14 l3.19,0.53c0.12,0.02,0.21,0.13,0.21,0.26l-0.37,12.46L798.26,654.74z M822.78,662.93H798.2v-7.95l-3.22-0.75l0.38-12.67 l-3.4-0.57l-0.19-69.6l34.42-0.19l-0.38,31.21l2.84,0.37l-0.19,24.4l-2.46,0.19v25.72h-3.22V662.93z"></path>
                                <text x="-645" y="815" class="svg__text" transform="rotate(270)"><?= Yii::t('app', 'section_txt') ?> 1</text>
                            </g>
                        </a>
                        <a href="<?= Url::to(['genplan/view', 'section_id' => 152]) ?>">
                            <path class="svg__path"
                                  d="M870.19,505.07l-0.37,32.41l-20.37,0.18c-0.07,0-0.13,0.03-0.17,0.07l-6.05,5.87 c-0.08,0.07-0.1,0.18-0.06,0.28l1.06,2.49l-9.23,8.86l-2.34-0.35c-0.08-0.01-0.15,0.01-0.21,0.06l-7.57,6.8 c-0.06,0.06-0.09,0.14-0.08,0.22l0.92,8.23h-31.05v-28.2L806,530.28l2.29,1.24c0.1,0.05,0.21,0.04,0.29-0.04l6.53-6.25 c0.09-0.09,0.11-0.23,0.03-0.33l-2.62-3.6l5.26-4.88h2.92c0.07,0,0.13-0.03,0.17-0.07l11.09-10.71L870.19,505.07z"></path>
                            <path class="svg__path"
                                  d="M825.72,570.19l-0.92-8.23c-0.01-0.08,0.02-0.16,0.08-0.22l7.57-6.8c0.06-0.05,0.13-0.07,0.21-0.06l2.34,0.35l9.23-8.86 l-1.06-2.49c-0.04-0.1-0.02-0.21,0.06-0.28l6.05-5.87c0.04-0.04,0.1-0.07,0.17-0.07l20.37-0.18l0.37-32.41l-38.23,0.57 l-11.09,10.71c-0.04,0.04-0.1,0.07-0.17,0.07h-2.92l-5.26,4.88l2.62,3.6c0.08,0.1,0.06,0.24-0.03,0.33l-6.53,6.25 c-0.08,0.08-0.19,0.09-0.29,0.04l-2.29-1.24l-11.33,11.71v28.2H825.72z M870.44,504.82l-0.37,32.91l-20.62,0.18l-6.05,5.87 l1.13,2.65l-9.45,9.07l-2.46-0.37l-7.57,6.8l0.95,8.51h-31.58v-28.55l11.53-11.92l2.46,1.33l6.53-6.25l-2.75-3.78l5.49-5.1h3.02 l11.16-10.78L870.44,504.82z"></path>
                            <path class="svg__path"
                                  d="M870.07,537.73l0.37-32.91l-38.58,0.57l-11.16,10.78h-3.02l-5.49,5.1l2.75,3.78l-6.53,6.25l-2.46-1.33l-11.53,11.92v28.55 H826l-0.95-8.51l7.57-6.8l2.46,0.37l9.45-9.07l-1.13-2.65l6.05-5.87L870.07,537.73z M870.62,504.64c0.05,0.05,0.07,0.12,0.07,0.18 l-0.37,32.91c0,0.14-0.11,0.25-0.25,0.25l-20.52,0.18l-5.85,5.68l1.06,2.49c0.04,0.1,0.02,0.21-0.06,0.28l-9.45,9.07 c-0.05,0.05-0.13,0.08-0.21,0.07l-2.34-0.36l-7.39,6.64l0.94,8.38c0.01,0.07-0.02,0.14-0.06,0.2c-0.05,0.05-0.12,0.08-0.19,0.08 h-31.58c-0.14,0-0.25-0.11-0.25-0.25v-28.55c0-0.06,0.03-0.13,0.07-0.17l11.53-11.92c0.08-0.08,0.2-0.1,0.3-0.05l2.3,1.24 l6.24-5.97l-2.62-3.6c-0.08-0.11-0.06-0.25,0.03-0.33l5.49-5.1c0.05-0.05,0.11-0.07,0.17-0.07h2.92l11.09-10.71 c0.04-0.04,0.1-0.07,0.17-0.07l38.58-0.57C870.5,504.58,870.57,504.6,870.62,504.64z"></path>
                            <text x="248" y="953" class="svg__text" transform="rotate(319)"><?= Yii::t('app', 'section_txt') ?> 2</text>
                        </a>
                        <a href="<?= Url::to(['genplan/view', 'section_id' => 153]) ?>">
                            <g class="svg__path">
                                <path class="svg__path"
                                      d="M947.36,542v28.19h-30.7l0.37-7.87c0-0.06-0.02-0.12-0.06-0.17l-7.38-8.51c-0.07-0.08-0.18-0.11-0.28-0.07 l-2.3,0.89l-8.64-8.45l1.04-1.72c0.06-0.11,0.04-0.23-0.05-0.31l-6.8-6.53c-0.05-0.04-0.11-0.07-0.18-0.07h-20.36l0.37-33.06 l37.47,0.75l11.47,11.84c0.04,0.04,0.09,0.07,0.15,0.07l1.82,0.18l6.33,5.43l-3.18,2.65c-0.05,0.05-0.08,0.12-0.09,0.19 c0,0.07,0.04,0.14,0.09,0.19l6.81,5.87c0.08,0.06,0.19,0.07,0.28,0.02l1.55-0.85L947.36,542z"></path>
                                <path d="M947.36,570.19V542l-12.27-11.34l-1.55,0.85c-0.09,0.05-0.2,0.04-0.28-0.02l-6.81-5.87c-0.05-0.05-0.09-0.12-0.09-0.19 c0.01-0.07,0.04-0.14,0.09-0.19l3.18-2.65l-6.33-5.43l-1.82-0.18c-0.06,0-0.11-0.03-0.15-0.07l-11.47-11.84l-37.47-0.75 l-0.37,33.06h20.36c0.07,0,0.13,0.03,0.18,0.07l6.8,6.53c0.09,0.08,0.11,0.2,0.05,0.31l-1.04,1.72l8.64,8.45l2.3-0.89 c0.1-0.04,0.21-0.01,0.28,0.07l7.38,8.51c0.04,0.05,0.06,0.11,0.06,0.17l-0.37,7.87H947.36z M947.61,541.89v28.55H916.4l0.38-8.13 l-7.38-8.51l-2.45,0.95l-8.89-8.7l1.13-1.89l-6.81-6.53h-20.61l0.38-33.57l37.82,0.76l11.54,11.91l1.89,0.19l6.62,5.68l-3.41,2.83 l6.81,5.87l1.71-0.95L947.61,541.89z"></path>
                                <path d="M947.61,570.44v-28.55l-12.48-11.54l-1.71,0.95l-6.81-5.87l3.41-2.83l-6.62-5.68l-1.89-0.19l-11.54-11.91l-37.82-0.76 l-0.38,33.57h20.61l6.81,6.53l-1.13,1.89l8.89,8.7l2.45-0.95l7.38,8.51l-0.38,8.13H947.61z M947.86,541.89v28.55 c0,0.14-0.11,0.25-0.25,0.25H916.4c-0.07,0-0.13-0.03-0.18-0.08c-0.05-0.05-0.07-0.11-0.07-0.18l0.38-8.03l-7.2-8.3l-2.29,0.88 c-0.1,0.03-0.2,0.02-0.27-0.05l-8.89-8.7c-0.08-0.09-0.1-0.21-0.04-0.31l1.03-1.72l-6.59-6.32h-20.51c-0.07,0-0.13-0.03-0.18-0.07 c-0.05-0.05-0.07-0.12-0.07-0.18l0.38-33.57c0-0.07,0.02-0.13,0.07-0.18c0.05-0.04,0.11-0.06,0.18-0.07l37.83,0.76 c0.06,0,0.13,0.03,0.17,0.08l11.47,11.84l1.8,0.18c0.06,0.01,0.1,0.03,0.14,0.06l6.62,5.68c0.06,0.04,0.09,0.11,0.09,0.19 c0,0.07-0.03,0.14-0.09,0.19l-3.18,2.65l6.45,5.55l1.55-0.86c0.1-0.05,0.21-0.04,0.29,0.04l12.49,11.53 C947.83,541.75,947.86,541.82,947.86,541.89z"></path>
                                <text x="985" y="-317" class="svg__text" transform="rotate(48)"><?= Yii::t('app', 'section_txt') ?> 3</text>
                            </g>
                        </a>
                        <a href="<?= Url::to(['genplan/view', 'section_id' => 154]) ?>">
                            <g class="svg__path">
                                <path class="svg__path"
                                      d="M949,571.7l0.75,69.32l-2.28-0.15c-0.15-0.03-0.29,0.03-0.4,0.14c-0.1,0.09-0.16,0.23-0.15,0.37l0.36,12.51 l-3.25-0.16c0,0,0,0-0.01,0c-0.13,0-0.26,0.05-0.35,0.14c-0.1,0.09-0.16,0.23-0.16,0.37l0.18,8.57l-24.48,0.37l0.72-9.67  c0.01-0.14-0.04-0.28-0.14-0.38c-0.09-0.1-0.22-0.16-0.36-0.16h-3.26l0.92-25.39c0-0.14-0.05-0.27-0.14-0.37  c-0.09-0.09-0.22-0.15-0.36-0.15h-2.71v-24.15h3.66c0.14,0,0.27-0.06,0.36-0.16c0.09-0.1,0.14-0.24,0.14-0.37l-1.86-30.68H949z"></path>
                                <path d="M950.25,641.56l-0.23-0.02c0.06,0,0.11-0.03,0.15-0.07c0.05-0.05,0.08-0.1,0.08-0.17V641.56z"></path>
                                <path d="M949.5,571.2v0.25c0-0.14-0.11-0.25-0.25-0.25H949.5z"></path>
                                <path d="M947.8,654.42l-2.45-0.13l2.18,0.11c0.07,0,0.13-0.02,0.18-0.07c0.05-0.05,0.08-0.12,0.08-0.18L947.8,654.42z"></path>
                                <path d="M947.95,641.4l-0.3-0.01c0.01-0.01,0.03-0.01,0.04-0.01L947.95,641.4z"></path>
                                <path d="M947.5,641.45c-0.04,0.04-0.07,0.1-0.07,0.16l-0.01-0.24l0.23,0.02C947.59,641.39,947.54,641.42,947.5,641.45z"></path>
                                <path d="M944.2,663.07v0.23h-0.22c0.06,0,0.11-0.03,0.15-0.07C944.17,663.18,944.19,663.13,944.2,663.07z"></path>
                                <path d="M944.2,663.05c0,0.01,0,0.01,0,0.02l-0.1-4.62L944.2,663.05z"></path>
                                <path d="M944.01,654.23l0.26,0.01c-0.06,0-0.12,0.02-0.17,0.07c-0.05,0.05-0.08,0.11-0.08,0.18L944.01,654.23z"></path>
                                <path d="M918.95,663.68l25.03-0.38c-0.01,0.01-0.02,0.01-0.03,0.01L918.95,663.68z"></path>
                                <path d="M919.43,653.47l-0.02,0.27c0-0.07-0.02-0.14-0.07-0.19c-0.05-0.05-0.11-0.08-0.18-0.08H919.43z"></path>
                                <path d="M918.76,663.6c0.04,0.04,0.1,0.07,0.16,0.08h-0.24h-0.01l0.02-0.27C918.69,663.48,918.71,663.55,918.76,663.6z"></path>
                                <path d="M917.52,602.16l0.02,0.25h-0.27c0.07,0,0.14-0.03,0.18-0.08C917.5,602.28,917.52,602.22,917.52,602.16z"></path>
                                <path d="M916.59,627.56l-0.01,0.26c0-0.07-0.02-0.13-0.07-0.18s-0.11-0.08-0.18-0.08H916.59z"></path>
                                <path d="M915.91,653.47h-0.26l0.01-0.23c0,0.06,0.03,0.12,0.07,0.15C915.77,653.44,915.84,653.47,915.91,653.47z"></path>
                                <path d="M915.66,571.45l1.19,19.57l-1.19-19.55C915.66,571.46,915.66,571.46,915.66,571.45z"></path>
                                <path d="M915.91,571.2c-0.07,0-0.13,0.03-0.18,0.08c-0.05,0.04-0.07,0.11-0.07,0.17l-0.01-0.25H915.91z"></path>
                                <path d="M913.63,627.31h2.96c0.07,0,0.13,0.03,0.18,0.08c0.05,0.05,0.07,0.11,0.07,0.18l-0.93,25.65h3.52 c0.07,0,0.13,0.03,0.18,0.08s0.07,0.12,0.07,0.19l-0.74,9.94l25.01-0.37l-0.19-8.83c0-0.07,0.03-0.13,0.08-0.18 c0.05-0.05,0.12-0.07,0.19-0.07l3.51,0.17l-0.37-12.78c0-0.07,0.02-0.13,0.07-0.18s0.12-0.08,0.19-0.07l2.57,0.17l-0.75-69.84 h-33.34l1.88,30.94c0,0.07-0.02,0.14-0.07,0.19c-0.05,0.05-0.11,0.08-0.18,0.08h-3.91V627.31z M913.38,602.66 c0-0.14,0.11-0.25,0.25-0.25h3.64h0.27l-0.02-0.25l-0.67-11.14l-1.19-19.57c0-0.06,0.02-0.13,0.07-0.17 c0.05-0.05,0.11-0.08,0.18-0.08h33.34c0.14,0,0.25,0.11,0.25,0.25l0.75,69.84v0.01c0,0.07-0.03,0.12-0.08,0.17 c-0.04,0.04-0.09,0.07-0.15,0.07c-0.01,0-0.02,0-0.03,0l-2.04-0.14l-0.26-0.02c-0.01,0-0.03,0-0.04,0.01l-0.23-0.02l0.01,0.24 l0.36,12.54c0,0.06-0.03,0.13-0.08,0.18c-0.05,0.05-0.11,0.07-0.18,0.07l-2.18-0.11l-1.08-0.05l-0.26-0.01l0.01,0.26l0.08,3.96 l0.1,4.62c-0.01,0.06-0.03,0.11-0.07,0.16c-0.04,0.04-0.09,0.07-0.15,0.07l-25.03,0.38c-0.01,0-0.01,0-0.01,0 c-0.01,0-0.01,0-0.02,0c-0.06-0.01-0.12-0.04-0.16-0.08c-0.05-0.05-0.07-0.12-0.07-0.19l0.72-9.67l0.02-0.27h-0.27h-3.25 c-0.07,0-0.14-0.03-0.18-0.08c-0.04-0.03-0.07-0.09-0.07-0.15c0-0.01,0-0.02,0-0.03l0.92-25.39l0.01-0.26h-0.26h-2.7 c-0.14,0-0.25-0.11-0.25-0.25V602.66z"></path>
                                <path d="M913.88,602.91v24.15h2.71c0.14,0,0.27,0.06,0.36,0.15c0.09,0.1,0.14,0.23,0.14,0.37l-0.92,25.39h3.26 c0.14,0,0.27,0.06,0.36,0.16c0.1,0.1,0.15,0.24,0.14,0.38l-0.72,9.67l24.48-0.37l-0.18-8.57c0-0.14,0.06-0.28,0.16-0.37 c0.09-0.09,0.22-0.14,0.35-0.14c0.01,0,0.01,0,0.01,0l3.25,0.16l-0.36-12.51c-0.01-0.14,0.05-0.28,0.15-0.37 c0.11-0.11,0.25-0.17,0.4-0.14l2.28,0.15L949,571.7h-32.82l1.86,30.68c0,0.13-0.05,0.27-0.14,0.37c-0.09,0.1-0.22,0.16-0.36,0.16 H913.88z M916.59,627.31h-2.96v-24.65h3.91c0.07,0,0.13-0.03,0.18-0.08c0.05-0.05,0.07-0.12,0.07-0.19l-1.88-30.94h33.34 l0.75,69.84l-2.57-0.17c-0.07-0.01-0.14,0.02-0.19,0.07s-0.07,0.11-0.07,0.18l0.37,12.78l-3.51-0.17c-0.07,0-0.14,0.02-0.19,0.07 c-0.05,0.05-0.08,0.11-0.08,0.18l0.19,8.83l-25.01,0.37l0.74-9.94c0-0.07-0.02-0.14-0.07-0.19s-0.11-0.08-0.18-0.08h-3.52 l0.93-25.65c0-0.07-0.02-0.13-0.07-0.18C916.72,627.34,916.66,627.31,916.59,627.31z"></path>
                                <path d="M913.38,627.56v-0.25c0,0.14,0.11,0.25,0.25,0.25H913.38z"></path>
                                <path d="M913.38,602.41h0.25c-0.14,0-0.25,0.11-0.25,0.25V602.41z"></path>
                                <path d="M913.38,602.16h3.89l-1.87-30.94c-0.01-0.07,0.02-0.14,0.06-0.19c0.05-0.05,0.12-0.08,0.19-0.08h33.85 c0.14,0,0.25,0.11,0.25,0.25l0.75,70.35c0.01,0.07-0.02,0.14-0.07,0.19s-0.12,0.08-0.19,0.06l-2.56-0.17l0.37,12.78 c0,0.07-0.03,0.14-0.08,0.18c-0.05,0.05-0.12,0.08-0.19,0.08l-3.51-0.18l0.18,8.81c0,0.07-0.02,0.13-0.07,0.18 c-0.04,0.05-0.11,0.07-0.17,0.07l-25.53,0.38c-0.01,0-0.01,0-0.01,0c-0.07,0-0.13-0.02-0.18-0.07c-0.05-0.06-0.07-0.12-0.07-0.19 l0.74-9.95h-3.51c-0.07,0-0.14-0.03-0.18-0.08c-0.05-0.04-0.08-0.11-0.07-0.18l0.93-25.65h-2.95c-0.14,0-0.25-0.11-0.25-0.25 v-25.15C913.13,602.27,913.24,602.16,913.38,602.16z M913.38,627.31v0.25h0.25h2.7c0.07,0,0.13,0.03,0.18,0.08 s0.07,0.11,0.07,0.18l-0.92,25.39c0,0.01,0,0.02,0,0.03l-0.01,0.23h0.26h3.25c0.07,0,0.13,0.03,0.18,0.08 c0.05,0.05,0.07,0.12,0.07,0.19l-0.72,9.67l-0.02,0.27h0.01h0.24c0.01,0,0.01,0,0.02,0c0,0,0,0,0.01,0l25-0.37 c0.01,0,0.02,0,0.03-0.01h0.22v-0.23c0-0.01,0-0.01,0-0.02l-0.1-4.6l-0.08-3.96c0-0.07,0.03-0.13,0.08-0.18 c0.05-0.05,0.11-0.07,0.17-0.07l1.08,0.05l2.45,0.13l-0.01-0.27l-0.36-12.54c0-0.06,0.03-0.12,0.07-0.16 c0.04-0.03,0.09-0.06,0.15-0.06l0.3,0.01l2.04,0.14c0.01,0,0.02,0,0.03,0l0.23,0.02v-0.26v-0.01l-0.75-69.84v-0.25h-0.25h-33.34 h-0.26l0.01,0.25c0,0.01,0,0.01,0,0.02l1.19,19.55l0.67,11.14c0,0.06-0.02,0.12-0.07,0.17c-0.04,0.05-0.11,0.08-0.18,0.08h-3.64 h-0.25v0.25V627.31z"></path>
                                <path d="M913.38,628.06c-0.28,0-0.5-0.22-0.5-0.5v-25.15c0-0.28,0.22-0.5,0.5-0.5h3.63l-1.86-30.68 c-0.01-0.14,0.04-0.27,0.13-0.37c0.09-0.1,0.23-0.16,0.37-0.16h33.85c0.27,0,0.5,0.22,0.5,0.49l0.75,70.36 c0.01,0.14-0.05,0.27-0.15,0.37c-0.12,0.11-0.26,0.16-0.41,0.13l-2.26-0.15l0.37,12.5c0,0.14-0.05,0.28-0.15,0.37 c-0.1,0.09-0.23,0.15-0.37,0.15l-3.25-0.17l0.17,8.54c0.01,0.14-0.05,0.27-0.14,0.36c-0.09,0.1-0.22,0.15-0.35,0.15l-25.53,0.38 h-0.01c-0.14,0-0.27-0.05-0.36-0.15c-0.1-0.11-0.15-0.25-0.14-0.39l0.72-9.67h-3.24c-0.14,0-0.27-0.05-0.36-0.15 c-0.1-0.1-0.15-0.23-0.14-0.36l0.92-25.4H913.38z M917.27,602.16h-3.89c-0.14,0-0.25,0.11-0.25,0.25v25.15 c0,0.14,0.11,0.25,0.25,0.25h2.95l-0.93,25.65c-0.01,0.07,0.02,0.14,0.07,0.18c0.04,0.05,0.11,0.08,0.18,0.08h3.51l-0.74,9.95 c0,0.07,0.02,0.13,0.07,0.19c0.05,0.05,0.11,0.07,0.18,0.07c0,0,0,0,0.01,0l25.53-0.38c0.06,0,0.13-0.02,0.17-0.07 c0.05-0.05,0.07-0.11,0.07-0.18l-0.18-8.81l3.51,0.18c0.07,0,0.14-0.03,0.19-0.08c0.05-0.04,0.08-0.11,0.08-0.18l-0.37-12.78 l2.56,0.17c0.07,0.02,0.14-0.01,0.19-0.06s0.08-0.12,0.07-0.19l-0.75-70.35c0-0.14-0.11-0.25-0.25-0.25h-33.85 c-0.07,0-0.14,0.03-0.19,0.08c-0.04,0.05-0.07,0.12-0.06,0.19L917.27,602.16z"></path>
                                <text x="590" y="-928" class="svg__text" transform="rotate(90)"><?= Yii::t('app', 'section_txt') ?> 4</text>
                            </g>
                        </a>
                    </svg>
                    <!-- SVG -->

                </div>
                <!-- IMAGE -->

                <div class="range__wrap">
                    <div class="range__title"><?= Yii::t('app', 'scale_txt') ?></div>
                    <input type="range" min="0.8" max="1.8" step="0.5" id="" class="my-image-range">
                    <div class="range-plus">+</div>
                    <div class="range-minus">-</div>
                </div>

                <div class="range__wrap_mob">
                    <img src="/img/range__wrap_mob.svg">
                </div>

            </div>
        </div>

</section>
