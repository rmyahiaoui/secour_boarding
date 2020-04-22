<?php
/**
 * Cette class représente un billet de train
 * @param int       $id
 * @param string    $departure
 * @param string    $arrival
 * @param string    $seat
 * @param string    $counter
 * @param string    $number
 * @param DateTime  $departureDate
 * @param DateTime  $arrivalDate
*/
class TrainTicket extends Ticket
{

    /**
     *  verifié l'existance des données reçu
     *  @return void|Exception
     */
    public function check($data) {
        if(!$data['seat']) {
            throw new Exception('le numéro du siege doit étre renseigné');
        }
        if(!$data['number']) {
            throw new Exception('le numéro de train doit étre renseigné');
        }
        parent::check($data);
    }

    public function getItenaryMsg() {
        $this->itenaryMsg .= 'Take train '.$this->getNumber().' from '.$this->getDeparture().' to '.$this->getArrival().'.';
        parent::getItenaryMsg();
        return $this->itenaryMsg;
    }

}