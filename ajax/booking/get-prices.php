<?php

require '../../include.php';

$originalCheckin = $_POST['checkin'];
$checkin = date("Y-m-d", strtotime($originalCheckin));
$originalCheckout = $_POST['checkout'];
$checkout = date("Y-m-d", strtotime($originalCheckout));

$roomtype = new RoomType();
$roomtypes = $roomtype->getRoomTypesBook();
$subroomtypes = $roomtype->getAllSubRoomTypes();

$roombasis = new RoomBasis();
$roombasises = $roombasis->getAll();

$roomprice = new RoomPrice();

$defaultprice = new DefaultRoomPrice();


$bookedrooms = new BookedRooms(null);

$bookingDates = $bookedrooms->createDateRange($checkin, $checkout, 'Y-m-d');
$dayCount = count($bookingDates);

$arr = array();
$typesdata = array();

foreach ($subroomtypes as $subroomtype) {

    $typesdata['id'] = $subroomtype['id'];
    $typesdata['type'] = $subroomtype['room_type'];
    $typesdata['days'] = $dayCount;
    $typesdata['parent'] = $subroomtype['is_Child'];
    
    $DISCOUNT = new Discount(); 
    $typesdata['discount'] = $DISCOUNT->getDiscount($checkin);

    $roomSet = array();
    foreach ($bookingDates as $key => $bookingDate) {
        $totalbooked = 0;
        $mainroomtype = RoomType::getAllRoomTypeById($subroomtype['is_Child']);
        $subrooms = RoomType::getAllSubRoomsByMain($mainroomtype['id']);

        foreach ($subrooms as $subroom) {
            $bookedData = $bookedrooms->getByDateAndRoomType($bookingDate, $subroom['id']);
            $booked = (int) $bookedData['booked_rooms'];
            $totalbooked = $totalbooked + $booked;
        }


        $totalRooms = (int) $mainroomtype['num_of_room'];
        $av = $totalRooms - $totalbooked;
        array_push($roomSet, $av);
    }
    // get min by roomset
    $avRooms = min($roomSet);

    $typesdata['available'] = $avRooms;

    $arr[$subroomtype['id']] = $typesdata;
    $pricesByBasis = array();

    foreach ($roombasises as $roombasis) {

        $price = $roomprice->getPrice($subroomtype['id'], $roombasis['id'], $checkin);
        if ($price['price'] == null) {
            //$price['price'] = '0.00';
            $pricedata = $defaultprice->getPriceByIds($subroomtype['id'], $roombasis['id']);
            $price['price'] = $pricedata['price'];
        }
        $pricesByBasis[$roombasis['id']] = $price['price'];
    }

    $arr[$subroomtype['id']]['prices'] = $pricesByBasis;
}


header('Content-Type: application/json');
echo json_encode($arr, JSON_PRETTY_PRINT);
