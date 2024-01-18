=======
Example
=======

The first step is to create a value valTester which implements ValTesterInterface.  ValTesterInterface has two
methods: testValue, which returns a boolean, and getMsgId which returns a string.  If you only intend on testing
a value internally and do not need to produce a message for your end user, then getMsgId can simply return an empty
string.  The base implementations in the library have getMsgId return an empty string by default.

The library has a few kinds of built-in testers.  There is one which leverages filter_var, called FilterVarTester.
Supply a filter constant, add options / flags and you are all set.  If you want to create an end user message for your filter
var valTester, then extend the existing class and override getMsgId to return a string, which would be a key into a
messages library.  Then create a validator object using this valTester and add a message to the library file(s).::


    <?php

    class FilterVarUrlTester extends FilterVarTester
    {
        public function __construct()
        {
            parent::__construct(FILTER_VALIDATE_URL);
            $this->addFlag(FILTER_FLAG_HOST_REQUIRED);
        }

        public function getMsgId(): string
        {
            return 'invalid_url';
        }
    }

    class ValidatorUrl extends Validator
    {
        public function __construct(ValidatorMsg $msg, FilterVarUrlTester $valTester)
        {
            parent::__construct($msg, $valTester);
            // if you want to make the input optional - the default for required is true.
            $this->setRequired(false);
        }
    }

    in your messages.en.php file

    return [
        'invalid_url' => 'The url supplied is not valid.',
    ];

In addition to the filter_var valTester, there is also a MinMaxTester.  More specifically, there are separate min max
testers for integers, floats and dates (in order to keep our arguments tightly typed).  The following example uses the
built in MinMaxDateTester but does not contemplate sending a  message back to the end user.::

    <?php

    $fromDate = new DateTime('2022-01-01');
    $toDate = new DateTime('2022-12-31');
    $valTester = new MinMaxDateTester($fromDate, $toDate);

Another built in class is the RegexTester class.  The pcRegex objects all have a label, used to help identify what
the regex is trying to find.  For example, lets say you want an input to consist solely of alphabetic characters
(Latin script).  You could use a ctype verb or you can use the RegexAlphabetic object in the pvcRegex library which
also has a label built into the object.  Then your valTester looks like this::

    <php?

    $regex = new RegexAlphabetic();
    $valTester = new RegexTester($regex);
    $validator = new Validator(ValidatorMsg $msg, ValTesterInterface $valTester);


