<?php
add_filter('the_content', 'do_shortcode');
/* 
Plugin Name: GitHub Finder
Plugin URI: https//alex.berne.tech/
Description: Un widget pour afficher les derniers commits d'un dépôt Github publique.
Author: Alexandre
Version: 1.0.0
*/

add_action('widgets_init', 'github_finder_init',);

function github_finder_init()
{
    register_widget("WidgetGitHubFinder");
}

class WidgetGitHubFinder extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'WidgetGitHubFinder', // Base ID
            'GitHub Finder', // Name
            array(
                'description' => __(
                    'Un widget pour récupérer les commits d\' repository GitHub',
                    'text_domain'
                ),
            )
        );
    }

    function widget($args, $instance)
    {
        extract($args);

        $args["commits"] = WidgetGitHubFinder::callAPI($instance['github_account'], $instance['github_repo']);
        $args["commits"] = array_slice($args["commits"], 0, intval($instance["commit_amount"]));

        echo $before_widget;

        echo "<h2>Commits GitHub</h2>";
        echo "La date est donnée tels que : AAAA/MM/jj - hh:mm:ss.\n";
        foreach ($args["commits"] as $commit) {
            echo  "<p><strong>" . "Nom : " . $commit->commit->author->name . "<br>";
            echo "Date : " ."</strong>" . str_replace('T', ' - ', substr($commit->commit->author->date, 0, -1)) .   "<br>";
            echo "<strong>Message : </strong>" . $commit->commit->message . "<br>". "</p>";
        }
        // echo "<pre>";
        // print_r($args["commits"]);
        // echo "</pre>";
        
        echo $after_widjet;
    }

    function form($instance)
    {
        if (isset($instance['github_account'])) {
            $githubAccount = esc_attr($instance['github_account']);
        } else {
            $githubAccount = __('', 'text_domain');
        }

        if (isset($instance['github_repo'])) {
            $githubRepo = esc_attr($instance['github_repo']);
        } else {
            $githubRepo = __('WordPress/WordPress', 'text_domain');
        }

        if (isset($instance['commit_amount'])) {
            $commitAmount = esc_attr($instance['commit_amount']);
        } else {
            $commitAmount = __('5', 'text_domain');
        }

?>
        <div>
            <p>
                <label for="<?php echo $this->get_field_name('github_account') ?>">
                    Compte GitHub :
                </label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('github_account') ?>" name="<?php echo $this->get_field_name('github_account') ?>" value="<?php echo $githubAccount; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_name('github_repo') ?>">
                    Dépot GitHub :
                </label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('github_repo') ?>" name="<?php echo $this->get_field_name('github_repo') ?>" value="<?php echo $githubRepo; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_name('commit_amount') ?>">
                    Quantité de commit :
                </label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('commit_amount') ?>" name="<?php echo $this->get_field_name('commit_amount') ?>" value="<?php echo $commitAmount; ?>" />
            </p>
        </div>
<?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['github_account'] = $new_instance['github_account'];
        $instance['github_repo'] = $new_instance['github_repo'];
        $instance['commit_amount'] = $new_instance['commit_amount'];

        return $instance;
    }

    static function callAPI($githubAccount, $githubRepo)
    {
        $curl = curl_init();
        $url = "https://api.github.com/repos/" . $githubRepo . "/commits";

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => $githubAccount
        ]);

        $result = json_decode(curl_exec($curl));
        curl_close($curl);
        return $result;
    }
}
