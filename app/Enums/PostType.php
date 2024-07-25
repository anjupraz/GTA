<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PostType extends Enum
{
	const Blog =   0;
    const Event =   1;
    const Banner =   2;
    const Team =   3;
    const Notice=4;
    const Gallery=5;
    const Client=6;
    const Client_Message=7;
    const Vacancy=8;
    const Service=9;
    const Impact=10;
}
