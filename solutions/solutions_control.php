<?php

class Blog {

        // Metoda kontrolera odpowiedzalna za zarzadzanie strona glowna
        public function strona_glowna()
        {
            // Wczytujemy nasz model
                $this->load->model('Solution_Result_Model');

                // Pobieramy tresc strony glownej z naszego modelu
                $data['tresc'] = $this->Solution_Result_Model->displayData();

                // Wyczytujemy nasz widok razem z trescia ktora tam wyswietlimy
                $this->load->view('blog', $data);
        }

    }
?>
