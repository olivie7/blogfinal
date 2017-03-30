<?php
namespace class;

class voitures
{
    private $marque;
    private $modèle;
    private $nb_portes;
    private $couleur = ['bleu', 'rouge', 'vert', 'gris'];
    private $annee;
    private $puissance;
    private $carburant = ['diesel', 'essence'];
    private $boite_vitesse;

    public function __construct($nb_portes) // Constructeur demandant 2 paramètres

    {
        //echo ''; // Message s'affichant une fois que tout objet est créé.
        //$this->setCouleur($couleur); // Initialisation de la couleur
        //$this->setPuissance($puissance); // Initialisation de la puissance
        $this->setNb_portes($nb_portes); // Initialisation du nbr de portes.
        //$this->marque = hyundai; // Initialisation de la marque à hyundai.

    }

    /**
     * Gets the value of marque.
     *
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Sets the value of marque.
     *
     * @param mixed $marque the marque
     *
     * @return self
     */
    private function _setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Gets the value of modèle.
     *
     * @return mixed
     */
    public function getModèle()
    {
        return $this->modèle;
    }

    /**
     * Sets the value of modèle.
     *
     * @param mixed $modèle the modèle
     *
     * @return self
     */
    private function _setModèle($modèle)
    {
        $this->modèle = $modèle;

        return $this;
    }

    /**
     * Gets the value of nb_portes.
     *
     * @return mixed
     */
    public function getNbPortes()
    {
        return $this->nb_portes;
    }

    /**
     * Sets the value of nb_portes.
     *
     * @param mixed $nb_portes the nb portes
     *
     * @return self
     */
    private function _setNbPortes($nb_portes)
    {
        if (!is_int($nb_portes)) // S'il ne s'agit pas d'un nombre entier.
        {
            trigger_error('Le nbre de portes doit être un nombre entier', E_USER_WARNING);
            //return;
        }
        $this->nb_portes = $nb_portes;

        return $this;
    }

    /**
     * Gets the value of mcouleur.
     *
     * @return mixed
     */
    public function getMcouleur()
    {
        return $this->couleur;
    }

    /**
     * Sets the value of mcouleur.
     *
     * @param mixed $mcouleur the mcouleur
     *
     * @return self
     */
    private function _setMcouleur($mcouleur)
    {

        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Gets the value of mannee.
     *
     * @return mixed
     */
    public function getMannee()
    {
        return $this->annee;
    }

    /**
     * Sets the value of mannee.
     *
     * @param mixed $mannee the mannee
     *
     * @return self
     */
    private function _setMannee($mannee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Gets the value of puissance.
     *
     * @return mixed
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * Sets the value of puissance.
     *
     * @param mixed $puissance the puissance
     *
     * @return self
     */
    private function _setPuissance($puissance)
    {
        $this->puissance = $puissance;

        return $this;
    }

    /**
     * Gets the value of carburant.
     *
     * @return mixed
     */
    public function getCarburant()
    {
        return $this->carburant;
    }

    /**
     * Sets the value of carburant.
     *
     * @param mixed $carburant the carburant
     *
     * @return self
     */
    private function _setCarburant($carburant)
    {
        $this->carburant = $carburant;

        return $this;
    }

    /**
     * Gets the value of boite_vitesse.
     *
     * @return mixed
     */
    public function getBoiteVitesse()
    {
        return $this->boite_vitesse;
    }

    /**
     * Sets the value of boite_vitesse.
     *
     * @param mixed $boite_vitesse the boite vitesse
     *
     * @return self
     */
    private function _setBoiteVitesse($boite_vitesse)
    {
        $this->boite_vitesse = $boite_vitesse;

        return $this;
    }
}
