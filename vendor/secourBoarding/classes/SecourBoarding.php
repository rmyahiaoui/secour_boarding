<?php
/**
 * Redouane YAHIAOUI
 * Date: 23/04/2020
 * Time: 10:00
 */

/**
 * ConvertData permettant d'afficher le resultat de la recherche
 */
class SecourBoarding
{
    private $_listBoarding  = [];
    private $_itenaryMsg    = '';
    private $_file          = '';

    /**
     * Constructeur de la class SecourBoarding
     * @param string $file
     */
    function __construct($file)
    {
        $this->_file = $file;
    }

    /**
     * @return array
     */
    public function getListBoarding(){
        return $this->_listBoarding;
    }

    /**
     * @return string
     */
    public function getFile(){
        return $this->_file;
    }

    /**
     * ConvertFile permet de convertir un json en tableau
     * @return array|Exception
     */
    private function convertFile()
    {
        $boardingJson = '';

        if (!file_exists(dirname(__FILE__) ."/../../../$this->_file")) {
            throw new Exception('the file does not exist');
        } 
        $boardingJson = file_get_contents(dirname(__FILE__) ."/../../../$this->_file");

        if (!$boardingJson) {
            throw new Exception('Please charge boarding.json with datas');
        }
        $boardingTab = json_decode($boardingJson, true);
        foreach($boardingTab as $data){
            $this->_listBoarding[] = Ticket::buildFromData($data);
        }
        return $this->_listBoarding; 
    }

    /**
     * SorteItinerary permet de trier un tableau à partir de la date de depart 
     * et retour
     * @return void
     */
    private function SorteItinerary()
    {
        usort($this->_listBoarding, function ($item1, $item2) {
            return ($item1->getId() <= $item2->getId()) ? -1 : 1;
            }
        );
    }

    /**
     * GetItinerary permet d'affiché le resultat de la recherche
     * @return string
     */
    public function getItinerary()
    {
        try{
            $this->convertFile();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        $this->SorteItinerary();
        $i = 1;
        foreach ($this->_listBoarding as $boarding) {
            $this->_itenaryMsg .= '-'.$i++ .' ';
            $this->_itenaryMsg .= $boarding->getItenaryMsg();
            $this->_itenaryMsg .="\n";
        }
        $this->_itenaryMsg .="You have arrived at your final destination.\n";
        return $this->_itenaryMsg;
    }
}
