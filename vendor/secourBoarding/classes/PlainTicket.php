<?php
/**
 * Cette class représente un billet d'avion
 * @param int       $id
 * @param string    $departure
 * @param string    $arrival
 * @param string    $seat
 * @param string    $counter
 * @param string    $number
 * @param DateTime  $departureDate
 * @param DateTime  $arrivalDate
 * @param string    $gate
*/
class PlainTicket extends Ticket 
{
    
    /**
     *  verifié l'existance des données reçu
     *  @return void|Exception
     */
    public function check($data) {
        if(!$data['seat']) {
            throw new Exception('le numéro du siege doit étre renseigné');
        }
        if(!$data['gate']) {
            throw new Exception('la porte d\'embarquement doit étre renseigné');
        }
        if(!$data['number']) {
            throw new Exception('le numéro du vol doit étre renseigné');
        }
        parent::check($data);
    }

    public function getItenaryMsg() {
        $this->itenaryMsg .=  'From '.$this->getDeparture().' Airport, take flight '.$this->getNumber().' to '.$this->getArrival().'.';
        parent::getItenaryMsg();
        if (!empty($this->getCounter())) {
            $this->itenaryMsg .=' Baggage drop at ticket counter '.$this->getCounter().'.';
        } else {
            $this->itenaryMsg .= 'Baggage will we automatically transferred from your last leg.';
        }
        return $this->itenaryMsg;
    }
}