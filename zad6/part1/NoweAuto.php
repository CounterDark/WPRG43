<?php
class NoweAuto {
    private String $model;
    private float $cena;
    private float $kurs;

    public function __construct($model, $cena, $kurs) {
        $this->model = $model;
        $this->cena = $cena;
        $this->kurs = $kurs;
    }

    public function ObliczCene(): float {
        return $this->cena * $this->kurs;
    }

    public function getModel(): String {
        return $this->model;
    }

    public function setModel(String $model): void {
        $this->model = $model;
    }

    public function getCena(): float {
        return $this->cena;
    }

    public function setCena(float $cena): void {
        $this->cena = $cena;
    }

    public function getKurs(): float {
        return $this->kurs;
    }

    public function setKurs(float $kurs): void {
        $this->kurs = $kurs;
    }
}

class AutoZDodatkami extends NoweAuto {
    private float $alarm;
    private float $radio;
    private float $klimatyzacja;

    public function __construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja) {
        parent::__construct($model, $cena, $kurs);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function ObliczCene(): float {
        return (parent::getCena() + $this->alarm + $this->radio + $this->klimatyzacja)*parent::getKurs();
    }
}

class Ubezpieczenie extends AutoZDodatkami {
    private float $procent;
    private int $lata;

    public function __construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja, $procent, $lata) {
        parent::__construct($model, $cena, $kurs, $alarm, $radio, $klimatyzacja);
        $this->procent = $procent;
        $this->lata = $lata;
    }

    public function ObliczCene(): float {
        return $this->procent*(parent::ObliczCene()*((100-$this->lata)/100));
    }
}

$noweAuto = new NoweAuto("Audi", 100000, 4.5);
echo $noweAuto->ObliczCene();
echo "<br>";
$autoZDodatkami = new AutoZDodatkami("Audi", 100000, 4.5, 1000, 500, 2000);
echo $autoZDodatkami->ObliczCene();
echo "<br>";
$ubezpieczenie = new Ubezpieczenie("Audi", 100000, 4.5, 1000, 500, 2000, 0.1, 2);
echo $ubezpieczenie->ObliczCene();
?>