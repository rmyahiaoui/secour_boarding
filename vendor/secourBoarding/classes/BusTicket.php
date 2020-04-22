<?php
/**
 * Cette class représente un billet de bus
 * @param int       $id
 * @param string    $departure
 * @param string    $arrival
 * @param string    $seat
 * @param string    $counter
 * @param DateTime  $departureDate
 * @param DateTime  $arrivalDate
*/
class BusTicket extends Ticket
{

    public function getItenaryMsg() {
        $this->itenaryMsg .='Take the airport bus from '.$this->getDeparture().' to '.$this->getArrival().' Airport.';
        parent::getItenaryMsg();
        return $this->itenaryMsg;
    }
}