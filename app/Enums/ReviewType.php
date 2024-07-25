<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ReviewType extends Enum
{
    const Accomodation=   0;
    const Meals =   1;
    const Destination = 2;
    const Value_For_Money = 3;
    const Transportation= 4;
    const Itinerary= 5;
    const Overall= 6;

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::Accomodation:
                return 'Accomodation';
                break;
            case self::Meals:
                return 'Meals';
                break;
            case self::Destination:
                return 'Destination';
                break;
            case self::Value_For_Money:
                return 'Value for money';
                break;
            case self::Transportation:
                return 'Transportation';
                break;
            case self::Itinerary:
                return 'Itinerary';
                break;
            case self::Overall:
                return 'Overall';
            default:
                return self::getKey($value);
        }
    }

    public static function getAll(){
        $reviews= [ReviewType::getInstance(ReviewType::Accomodation),ReviewType::getInstance(ReviewType::Meals),ReviewType::getInstance(ReviewType::Destination),ReviewType::getInstance(ReviewType::Transportation),ReviewType::getInstance(ReviewType::Value_For_Money),ReviewType::getInstance(ReviewType::Itinerary),ReviewType::getInstance(ReviewType::Overall)];
        return $reviews;
    }
}
