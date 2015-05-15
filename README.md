# yii2-ativeresponse

Yii2 ajax module with active control from server side.
Most of existing ajax modules for Yii2 use javascript logic. yii2-ativeresponse is controlled from the server side.
All actions you add in PHP controller will be executed with corresponding jQuery function.
See Usage for details.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require srusakov/yii2-ativeresponse "dev-master"
```

or add

```
"srusakov/yii2-ativeresponse": "dev-master"
```

to the ```require``` section of your `composer.json` file.


## Usage

##### Attach `yii2-ativeresponse` to your layout file

```
ActiveResponse::registerAssets($this);
```

this will register all necessary javascript files and create global javascript variables.

##### Call server (without parameters)

````
<?= Html::a('ActiveResponse Button', null, [
    'href'=>'javascript:void(0);',
    'class' => 'btn btn-success',
    'onclick'=>"callAR('controller/action');"]) ?>
````

##### Call server (pass form as parameters)

````
<form id="theForm" name="theForm" onsubmit="callAR('controller/action', $('#theForm').serializeObject())">

var parameters = $('#theForm').serializeObject();
parameters.your_parameter = 'your value';
callAR('controller/action', parameters);
````

##### Call server (with callback)

````
callAR('controller/action', $('#theForm').serializeObject(), function() {
    alert('Callback called!');
});
````

##### Server side

````
class controllerController extends Controller {
    public function actionAction()
        {
            $ar = new \srusakov\activeresponse\ActiveResponse();

            // show standart browser's alert
            $ar->alert('called from PHP');

            // assign html to div
            $ar->html('div_id', $this->render('view'));

            // modify attribute
            $ar->attr('element', 'data-pjax' '0');

            // assign value to element
            $ar->val('element', 'new value');

            // modify css
            $ar->css('element', 'cssattr', 'value');

            //redirect
            $ar->redirect('/new_page.php');

            // evaluate javascript
            $ar->script("alert('wow!')");

            // and much, much more...
            $ar->focus('element');
            $ar->addClass('element', 'class');
            $ar->removeClass('element', 'class');
            $ar->show('element');
            $ar->hide('element');
            $ar->fadeIn('element');
            $ar->fadeOut('element');

            return $ar;
        }


## License

**yii2-activeresponse** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.