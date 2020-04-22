<?php
/**
 * Cette class représente un ticket
 * @param int       $id
 * @param string    $departure
 * @param string    $arrival
 * @param string    $seat
 * @param string    $counter
 * @param string    $number
 * @param DateTime  $departureDate
 * @param DateTime  $arrivalDate
 * @param string    $gate
 * @param string    $itenaryMsg
*/
abstract class Ticket 
{
    protected $id;
    protected $departure;
    protected $arrival;
    protected $seat;
    protected $counter;
    protected $number;
    protected $departureDate;
    protected $arrivalDate;
    protected $gate;
    protected $itenaryMsg = '';

    /**
     * Constructeur de la class SecourBoarding
     * @param array $data
     */
    function __construct($data)
    {
        $this->check($data);
        $this->id            = $data['id_ticket'];
        $this->departure     = $data['departure'];
        $this->arrival       = $data['arrival'];
        $this->seat          = $data['seat']; 
        $this->counter       = $data['counter'];
        $this->number        = $data['number'];
        $this->departureDate = new DateTime($data['departureDate']);
        $this->arrivalDate   = new DateTime($data['arrivalDate']);
        $this->gate          = $data['gate'];
    }

    /**
     *  verifié si les données recus sont correct
     *  @return void|Exception
     */
    public function check($data) {
        if(!$data['id_ticket']) {
            throw new Exception('le numéro du ticket doit étre renseigné');
        }
        if(!$data['departure']) {
            throw new Exception('le lieu de depart doit étre renseigné');
        }
        if(!$data['arrival']) {
            throw new Exception('le lieu d\'arrivé doit étre renseigné');
        }
        if(!$data['departureDate']) {
            throw new Exception('la date de depart doit étre reneigné');
        }
        if(!$data['arrivalDate']) {
            throw new Exception('la date d\'arrivé doit étre reneigné');
        }
    }

    /**
     * buildFromData permet de construire un objet à partir de sont type
     * @return Ticket
     */
    public static function buildFromData($data) {
        switch($data['type']) {
            case 'PLAIN' :
                return new PlainTicket($data);
            case 'BUS' :
                return new BusTicket($data);
            case 'TRAIN' :
                return new TrainTicket($data);
        }
    }

    /**
     * @return void
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return void
     */
    public function setDepartur($departure){
        $this->departure = $departure;
    }

    /**
     * @return void
     */
    public function setArrival($arrival){
        $this->arrival = $arrival;
    }

    /**
     * @return void
     */
    public function setSeat($seat){
        $this->seat = $seat;
    }

    /**
     * @return void
     */
    public function setCounter($counter){
        $this->counter = $counter;
    }

    /**
     * @return void
     */
    public function setNumber($number){
        $this->number = $number;
    }

    /**
     * @return void
     */
    public function setDepartureDate($departureDate){
        $this->departureDate = new DateTime($departureDate);
    }

    /**
     * @return void
     */
    public function setArrivalDate($arrivalDate){
        $this->arrivalDate = new DateTime($arrivalDate);
    }

    /**
     * @return void
     */
    public function setGate($gate){
        $this->gate = $gate;
    }

    /**
     * @return int
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDeparture(){
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getArrival(){
        return $this->arrival;
    }

    /**
     * @return string
     */
    public function getSeat(){
        return $this->seat;
    }

    /**
     * @return int
     */
    public function getCounter(){
        return $this->counter;
    }

    /**
     * @return string
     */
    public function getNumber(){
        return $this->number;
    }

    /**
     * @return DateTime
     */
    public function getDepartureDate(){
        return $this->departureDate;
    }

    /**
     * @return DateTime
     */
    public function getArrivalDate(){
        return $this->arrivalDate;
    }

    /**
     * @return string
     */
    public function getGate(){
        return $this->gate;
    }

    /**
     * getItenaryMsg affiche le message de l'itineraire
     * @return string
     */
    public function getItenaryMsg() {
        if (!empty($this->getGate())) {
            $this->itenaryMsg .=' Gate '.$this->getGate().',';
        }
        if (!empty($this->getSeat())) {
            $this->itenaryMsg .=' Sit in seat '.$this->getSeat().'.';
        } else {
            $this->itenaryMsg .=' No seat assignment.';
        }
        return $this->itenaryMsg;
    }
}