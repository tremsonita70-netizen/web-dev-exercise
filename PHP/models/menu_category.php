<?php
enum MenuCategory: int {
    case Drink =1;
    case Icecream =2;
    case Cake = 3;
    case Food = 4;

    public function label(): string{
        return match($this){
            self::Drink => 'Drink',
            self::Icecream => 'Icecream',
            self::Cake => 'Cake',
            self::Food => 'Food',
        };
    }
}
?>