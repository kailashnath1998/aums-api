<?php
/*
    Copyright (C) 2008-2012 Sergey Tsalkov (stsalkov@gmail.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


class DB
{
    // initial connection
  public static $dbName = '';
    public static $user = '';
    public static $password = '';
    public static $host = 'localhost';
    public static $port = null;
    public static $encoding = 'latin1';

  // configure workings
  public static $param_char = '%';
    public static $named_param_seperator = '_';
    public static $success_handler = false;
    public static $error_handler = true;
    public static $throw_exception_on_error = false;
    public static $nonsql_error_handler = null;
    public static $throw_exception_on_nonsql_error = false;
    public static $nested_transactions = false;
    public static $usenull = true;
    public static $ssl = ['key' => '', 'cert' => '', 'ca_cert' => '', 'ca_path' => '', 'cipher' => ''];
    public static $connect_options = [MYSQLI_OPT_CONNECT_TIMEOUT => 30];

  // internal
  protected static $mdb = null;

    public static function getMDB()
    {
        $mdb = self::$mdb;

        if ($mdb === null) {
            $mdb = self::$mdb = new MeekroDB();
        }

        static $variables_to_sync = ['param_char', 'named_param_seperator', 'success_handler', 'error_handler', 'throw_exception_on_error',
      'nonsql_error_handler', 'throw_exception_on_nonsql_error', 'nested_transactions', 'usenull', 'ssl', 'connect_options', ];

        $db_class_vars = get_class_vars('DB'); // the DB::$$var syntax only works in 5.3+

    foreach ($variables_to_sync as $variable) {
        if ($mdb->$variable !== $db_class_vars[$variable]) {
            $mdb->$variable = $db_class_vars[$variable];
        }
    }

        return $mdb;
    }

  // yes, this is ugly. __callStatic() only works in 5.3+
  public static function get()
  {
      $args = func_get_args();

      return call_user_func_array([self::getMDB(), 'get'], $args);
  }

    public static function disconnect()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'disconnect'], $args);
    }

    public static function query()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'query'], $args);
    }

    public static function queryFirstRow()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryFirstRow'], $args);
    }

    public static function queryOneRow()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryOneRow'], $args);
    }

    public static function queryAllLists()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryAllLists'], $args);
    }

    public static function queryFullColumns()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryFullColumns'], $args);
    }

    public static function queryFirstList()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryFirstList'], $args);
    }

    public static function queryOneList()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryOneList'], $args);
    }

    public static function queryFirstColumn()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryFirstColumn'], $args);
    }

    public static function queryOneColumn()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryOneColumn'], $args);
    }

    public static function queryFirstField()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryFirstField'], $args);
    }

    public static function queryOneField()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryOneField'], $args);
    }

    public static function queryRaw()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryRaw'], $args);
    }

    public static function queryRawUnbuf()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'queryRawUnbuf'], $args);
    }

    public static function insert()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'insert'], $args);
    }

    public static function insertIgnore()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'insertIgnore'], $args);
    }

    public static function insertUpdate()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'insertUpdate'], $args);
    }

    public static function replace()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'replace'], $args);
    }

    public static function update()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'update'], $args);
    }

    public static function delete()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'delete'], $args);
    }

    public static function insertId()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'insertId'], $args);
    }

    public static function count()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'count'], $args);
    }

    public static function affectedRows()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'affectedRows'], $args);
    }

    public static function useDB()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'useDB'], $args);
    }

    public static function startTransaction()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'startTransaction'], $args);
    }

    public static function commit()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'commit'], $args);
    }

    public static function rollback()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'rollback'], $args);
    }

    public static function tableList()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'tableList'], $args);
    }

    public static function columnList()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'columnList'], $args);
    }

    public static function sqlEval()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'sqlEval'], $args);
    }

    public static function nonSQLError()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'nonSQLError'], $args);
    }

    public static function serverVersion()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'serverVersion'], $args);
    }

    public static function transactionDepth()
    {
        $args = func_get_args();

        return call_user_func_array([self::getMDB(), 'transactionDepth'], $args);
    }

    public static function debugMode($handler = true)
    {
        self::$success_handler = $handler;
    }
}


class MeekroDB
{
    // initial connection
  public $dbName = '';
    public $user = '';
    public $password = '';
    public $host = 'localhost';
    public $port = null;
    public $encoding = 'latin1';

  // configure workings
  public $param_char = '%';
    public $named_param_seperator = '_';
    public $success_handler = false;
    public $error_handler = true;
    public $throw_exception_on_error = false;
    public $nonsql_error_handler = null;
    public $throw_exception_on_nonsql_error = false;
    public $nested_transactions = false;
    public $usenull = true;
    public $ssl = ['key' => '', 'cert' => '', 'ca_cert' => '', 'ca_path' => '', 'cipher' => ''];
    public $connect_options = [MYSQLI_OPT_CONNECT_TIMEOUT => 30];

  // internal
  public $internal_mysql = null;
    public $server_info = null;
    public $insert_id = 0;
    public $num_rows = 0;
    public $affected_rows = 0;
    public $current_db = null;
    public $nested_transactions_count = 0;

    public function __construct($host = null, $user = null, $password = null, $dbName = null, $port = null, $encoding = null)
    {
        if ($host === null) {
            $host = DB::$host;
        }
        if ($user === null) {
            $user = DB::$user;
        }
        if ($password === null) {
            $password = DB::$password;
        }
        if ($dbName === null) {
            $dbName = DB::$dbName;
        }
        if ($port === null) {
            $port = DB::$port;
        }
        if ($encoding === null) {
            $encoding = DB::$encoding;
        }

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbName = $dbName;
        $this->port = $port;
        $this->encoding = $encoding;
    }

    public function get()
    {
        $mysql = $this->internal_mysql;

        if (!($mysql instanceof MySQLi)) {
            if (!$this->port) {
                $this->port = ini_get('mysqli.default_port');
            }
            $this->current_db = $this->dbName;
            $mysql = new mysqli();

            $connect_flags = 0;
            if ($this->ssl['key']) {
                $mysql->ssl_set($this->ssl['key'], $this->ssl['cert'], $this->ssl['ca_cert'], $this->ssl['ca_path'], $this->ssl['cipher']);
                $connect_flags |= MYSQLI_CLIENT_SSL;
            }
            foreach ($this->connect_options as $key => $value) {
                $mysql->options($key, $value);
            }

      // suppress warnings, since we will check connect_error anyway
      @$mysql->real_connect($this->host, $this->user, $this->password, $this->dbName, $this->port, null, $connect_flags);

            if ($mysql->connect_error) {
                $this->nonSQLError('Unable to connect to MySQL server! Error: '.$mysql->connect_error);
            }

            $mysql->set_charset($this->encoding);
            $this->internal_mysql = $mysql;
            $this->server_info = $mysql->server_info;
        }

        return $mysql;
    }

    public function disconnect()
    {
        $mysqli = $this->internal_mysql;
        if ($mysqli instanceof MySQLi) {
            if ($thread_id = $mysqli->thread_id) {
                $mysqli->kill($thread_id);
            }
            $mysqli->close();
        }
        $this->internal_mysql = null;
    }

    public function nonSQLError($message)
    {
        if ($this->throw_exception_on_nonsql_error) {
            $e = new MeekroDBException($message);
            throw $e;
        }

        $error_handler = is_callable($this->nonsql_error_handler) ? $this->nonsql_error_handler : 'meekrodb_error_handler';

        call_user_func($error_handler, [
      'type'  => 'nonsql',
      'error' => $message,
    ]);
    }

    public function debugMode($handler = true)
    {
        $this->success_handler = $handler;
    }

    public function serverVersion()
    {
        $this->get();

        return $this->server_info;
    }

    public function transactionDepth()
    {
        return $this->nested_transactions_count;
    }

    public function insertId()
    {
        return $this->insert_id;
    }

    public function affectedRows()
    {
        return $this->affected_rows;
    }

    public function count()
    {
        $args = func_get_args();

        return call_user_func_array([$this, 'numRows'], $args);
    }

    public function numRows()
    {
        return $this->num_rows;
    }

    public function useDB()
    {
        $args = func_get_args();

        return call_user_func_array([$this, 'setDB'], $args);
    }

    public function setDB($dbName)
    {
        $db = $this->get();
        if (!$db->select_db($dbName)) {
            $this->nonSQLError("Unable to set database to $dbName");
        }
        $this->current_db = $dbName;
    }

    public function startTransaction()
    {
        if ($this->nested_transactions && $this->serverVersion() < '5.5') {
            return $this->nonSQLError('Nested transactions are only available on MySQL 5.5 and greater. You are using MySQL '.$this->serverVersion());
        }

        if (!$this->nested_transactions || $this->nested_transactions_count == 0) {
            $this->query('START TRANSACTION');
            $this->nested_transactions_count = 1;
        } else {
            $this->query("SAVEPOINT LEVEL{$this->nested_transactions_count}");
            $this->nested_transactions_count++;
        }

        return $this->nested_transactions_count;
    }

    public function commit($all = false)
    {
        if ($this->nested_transactions && $this->serverVersion() < '5.5') {
            return $this->nonSQLError('Nested transactions are only available on MySQL 5.5 and greater. You are using MySQL '.$this->serverVersion());
        }

        if ($this->nested_transactions && $this->nested_transactions_count > 0) {
            $this->nested_transactions_count--;
        }

        if (!$this->nested_transactions || $all || $this->nested_transactions_count == 0) {
            $this->nested_transactions_count = 0;
            $this->query('COMMIT');
        } else {
            $this->query("RELEASE SAVEPOINT LEVEL{$this->nested_transactions_count}");
        }

        return $this->nested_transactions_count;
    }

    public function rollback($all = false)
    {
        if ($this->nested_transactions && $this->serverVersion() < '5.5') {
            return $this->nonSQLError('Nested transactions are only available on MySQL 5.5 and greater. You are using MySQL '.$this->serverVersion());
        }

        if ($this->nested_transactions && $this->nested_transactions_count > 0) {
            $this->nested_transactions_count--;
        }

        if (!$this->nested_transactions || $all || $this->nested_transactions_count == 0) {
            $this->nested_transactions_count = 0;
            $this->query('ROLLBACK');
        } else {
            $this->query("ROLLBACK TO SAVEPOINT LEVEL{$this->nested_transactions_count}");
        }

        return $this->nested_transactions_count;
    }

    protected function formatTableName($table)
    {
        $table = trim($table, '`');

        if (strpos($table, '.')) {
            return implode('.', array_map([$this, 'formatTableName'], explode('.', $table)));
        } else {
            return '`'.str_replace('`', '``', $table).'`';
        }
    }

    public function update()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $params = array_shift($args);
        $where = array_shift($args);

        $query = str_replace('%', $this->param_char, 'UPDATE %b SET %? WHERE ').$where;

        array_unshift($args, $params);
        array_unshift($args, $table);
        array_unshift($args, $query);

        return call_user_func_array([$this, 'query'], $args);
    }

    public function insertOrReplace($which, $table, $datas, $options = [])
    {
        $datas = unserialize(serialize($datas)); // break references within array
    $keys = $values = [];

        if (isset($datas[0]) && is_array($datas[0])) {
            foreach ($datas as $datum) {
                ksort($datum);
                if (!$keys) {
                    $keys = array_keys($datum);
                }
                $values[] = array_values($datum);
            }
        } else {
            $keys = array_keys($datas);
            $values = array_values($datas);
        }

        if (isset($options['ignore']) && $options['ignore']) {
            $which = 'INSERT IGNORE';
        }

        if (isset($options['update']) && is_array($options['update']) && $options['update'] && strtolower($which) == 'insert') {
            if (array_values($options['update']) !== $options['update']) {
                return $this->query(
          str_replace('%', $this->param_char, 'INSERT INTO %b %lb VALUES %? ON DUPLICATE KEY UPDATE %?'),
          $table, $keys, $values, $options['update']);
            } else {
                $update_str = array_shift($options['update']);
                $query_param = [
          str_replace('%', $this->param_char, 'INSERT INTO %b %lb VALUES %? ON DUPLICATE KEY UPDATE ').$update_str,
          $table, $keys, $values, ];
                $query_param = array_merge($query_param, $options['update']);

                return call_user_func_array([$this, 'query'], $query_param);
            }
        }

        return $this->query(
      str_replace('%', $this->param_char, '%l INTO %b %lb VALUES %?'),
      $which, $table, $keys, $values);
    }

    public function insert($table, $data)
    {
        return $this->insertOrReplace('INSERT', $table, $data);
    }

    public function insertIgnore($table, $data)
    {
        return $this->insertOrReplace('INSERT', $table, $data, ['ignore' => true]);
    }

    public function replace($table, $data)
    {
        return $this->insertOrReplace('REPLACE', $table, $data);
    }

    public function insertUpdate()
    {
        $args = func_get_args();
        $table = array_shift($args);
        $data = array_shift($args);

        if (!isset($args[0])) { // update will have all the data of the insert
      if (isset($data[0]) && is_array($data[0])) { //multiple insert rows specified -- failing!
        $this->nonSQLError("Badly formatted insertUpdate() query -- you didn't specify the update component!");
      }

            $args[0] = $data;
        }

        if (is_array($args[0])) {
            $update = $args[0];
        } else {
            $update = $args;
        }

        return $this->insertOrReplace('INSERT', $table, $data, ['update' => $update]);
    }

    public function delete()
    {
        $args = func_get_args();
        $table = $this->formatTableName(array_shift($args));
        $where = array_shift($args);
        $buildquery = "DELETE FROM $table WHERE $where";
        array_unshift($args, $buildquery);

        return call_user_func_array([$this, 'query'], $args);
    }

    public function sqleval()
    {
        $args = func_get_args();
        $text = call_user_func_array([$this, 'parseQueryParams'], $args);

        return new MeekroDBEval($text);
    }

    public function columnList($table)
    {
        return $this->queryOneColumn('Field', 'SHOW COLUMNS FROM %b', $table);
    }

    public function tableList($db = null)
    {
        if ($db) {
            $olddb = $this->current_db;
            $this->useDB($db);
        }

        $result = $this->queryFirstColumn('SHOW TABLES');
        if (isset($olddb)) {
            $this->useDB($olddb);
        }

        return $result;
    }

    protected function preparseQueryParams()
    {
        $args = func_get_args();
        $sql = trim(strval(array_shift($args)));
        $args_all = $args;

        if (count($args_all) == 0) {
            return [$sql];
        }

        $param_char_length = strlen($this->param_char);
        $named_seperator_length = strlen($this->named_param_seperator);

        $types = [
      $this->param_char.'ll', // list of literals
      $this->param_char.'ls', // list of strings
      $this->param_char.'l',  // literal
      $this->param_char.'li', // list of integers
      $this->param_char.'ld', // list of decimals
      $this->param_char.'lb', // list of backticks
      $this->param_char.'lt', // list of timestamps
      $this->param_char.'s',  // string
      $this->param_char.'i',  // integer
      $this->param_char.'d',  // double / decimal
      $this->param_char.'b',  // backtick
      $this->param_char.'t',  // timestamp
      $this->param_char.'?',  // infer type
      $this->param_char.'ss',  // search string (like string, surrounded with %'s)
    ];

    // generate list of all MeekroDB variables in our query, and their position
    // in the form "offset => variable", sorted by offsets
    $posList = [];
        foreach ($types as $type) {
            $lastPos = 0;
            while (($pos = strpos($sql, $type, $lastPos)) !== false) {
                $lastPos = $pos + 1;
                if (isset($posList[$pos]) && strlen($posList[$pos]) > strlen($type)) {
                    continue;
                }
                $posList[$pos] = $type;
            }
        }

        ksort($posList);

    // for each MeekroDB variable, substitute it with array(type: i, value: 53) or whatever
    $chunkyQuery = []; // preparsed query
    $pos_adj = 0; // how much we've added or removed from the original sql string
    foreach ($posList as $pos => $type) {
        $type = substr($type, $param_char_length); // variable, without % in front of it
      $length_type = strlen($type) + $param_char_length; // length of variable w/o %

      $new_pos = $pos + $pos_adj; // position of start of variable
      $new_pos_back = $new_pos + $length_type; // position of end of variable
      $arg_number_length = 0; // length of any named or numbered parameter addition

      // handle numbered parameters
      if ($arg_number_length = strspn($sql, '0123456789', $new_pos_back)) {
          $arg_number = substr($sql, $new_pos_back, $arg_number_length);
          if (!array_key_exists($arg_number, $args_all)) {
              $this->nonSQLError("Non existent argument reference (arg $arg_number): $sql");
          }

          $arg = $args_all[$arg_number];

      // handle named parameters
      } elseif (substr($sql, $new_pos_back, $named_seperator_length) == $this->named_param_seperator) {
          $arg_number_length = strspn($sql, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_',
          $new_pos_back + $named_seperator_length) + $named_seperator_length;

          $arg_number = substr($sql, $new_pos_back + $named_seperator_length, $arg_number_length - $named_seperator_length);
          if (count($args_all) != 1 || !is_array($args_all[0])) {
              $this->nonSQLError('If you use named parameters, the second argument must be an array of parameters');
          }
          if (!array_key_exists($arg_number, $args_all[0])) {
              $this->nonSQLError("Non existent argument reference (arg $arg_number): $sql");
          }

          $arg = $args_all[0][$arg_number];
      } else {
          $arg_number = 0;
          $arg = array_shift($args);
      }

        if ($new_pos > 0) {
            $chunkyQuery[] = substr($sql, 0, $new_pos);
        }

        if (is_object($arg) && ($arg instanceof WhereClause)) {
            list($clause_sql, $clause_args) = $arg->textAndArgs();
            array_unshift($clause_args, $clause_sql);
            $preparsed_sql = call_user_func_array([$this, 'preparseQueryParams'], $clause_args);
            $chunkyQuery = array_merge($chunkyQuery, $preparsed_sql);
        } else {
            $chunkyQuery[] = ['type' => $type, 'value' => $arg];
        }

        $sql = substr($sql, $new_pos_back + $arg_number_length);
        $pos_adj -= $new_pos_back + $arg_number_length;
    }

        if (strlen($sql) > 0) {
            $chunkyQuery[] = $sql;
        }

        return $chunkyQuery;
    }

    protected function escape($str)
    {
        return "'".$this->get()->real_escape_string(strval($str))."'";
    }

    protected function sanitize($value)
    {
        if (is_object($value)) {
            if ($value instanceof MeekroDBEval) {
                return $value->text;
            } elseif ($value instanceof DateTime) {
                return $this->escape($value->format('Y-m-d H:i:s'));
            } else {
                return '';
            }
        }

        if (is_null($value)) {
            return $this->usenull ? 'NULL' : "''";
        } elseif (is_bool($value)) {
            return $value ? 1 : 0;
        } elseif (is_int($value)) {
            return $value;
        } elseif (is_float($value)) {
            return $value;
        } elseif (is_array($value)) {
            // non-assoc array?
      if (array_values($value) === $value) {
          if (is_array($value[0])) {
              return implode(', ', array_map([$this, 'sanitize'], $value));
          } else {
              return '('.implode(', ', array_map([$this, 'sanitize'], $value)).')';
          }
      }

            $pairs = [];
            foreach ($value as $k => $v) {
                $pairs[] = $this->formatTableName($k).'='.$this->sanitize($v);
            }

            return implode(', ', $pairs);
        } else {
            return $this->escape($value);
        }
    }

    protected function parseTS($ts)
    {
        if (is_string($ts)) {
            return date('Y-m-d H:i:s', strtotime($ts));
        } elseif (is_object($ts) && ($ts instanceof DateTime)) {
            return $ts->format('Y-m-d H:i:s');
        }
    }

    protected function intval($var)
    {
        if (PHP_INT_SIZE == 8) {
            return intval($var);
        }

        return floor(floatval($var));
    }

    protected function parseQueryParams()
    {
        $args = func_get_args();
        $chunkyQuery = call_user_func_array([$this, 'preparseQueryParams'], $args);

        $query = '';
        $array_types = ['ls', 'li', 'ld', 'lb', 'll', 'lt'];

        foreach ($chunkyQuery as $chunk) {
            if (is_string($chunk)) {
                $query .= $chunk;
                continue;
            }

            $type = $chunk['type'];
            $arg = $chunk['value'];
            $result = '';

            if ($type != '?') {
                $is_array_type = in_array($type, $array_types, true);
                if ($is_array_type && !is_array($arg)) {
                    $this->nonSQLError('Badly formatted SQL query: Expected array, got scalar instead!');
                } elseif (!$is_array_type && is_array($arg)) {
                    $this->nonSQLError('Badly formatted SQL query: Expected scalar, got array instead!');
                }
            }

            if ($type == 's') {
                $result = $this->escape($arg);
            } elseif ($type == 'i') {
                $result = $this->intval($arg);
            } elseif ($type == 'd') {
                $result = floatval($arg);
            } elseif ($type == 'b') {
                $result = $this->formatTableName($arg);
            } elseif ($type == 'l') {
                $result = $arg;
            } elseif ($type == 'ss') {
                $result = $this->escape('%'.str_replace(['%', '_'], ['\%', '\_'], $arg).'%');
            } elseif ($type == 't') {
                $result = $this->escape($this->parseTS($arg));
            } elseif ($type == 'ls') {
                $result = array_map([$this, 'escape'], $arg);
            } elseif ($type == 'li') {
                $result = array_map([$this, 'intval'], $arg);
            } elseif ($type == 'ld') {
                $result = array_map('doubleval', $arg);
            } elseif ($type == 'lb') {
                $result = array_map([$this, 'formatTableName'], $arg);
            } elseif ($type == 'll') {
                $result = $arg;
            } elseif ($type == 'lt') {
                $result = array_map([$this, 'escape'], array_map([$this, 'parseTS'], $arg));
            } elseif ($type == '?') {
                $result = $this->sanitize($arg);
            } else {
                $this->nonSQLError("Badly formatted SQL query: Invalid MeekroDB param $type");
            }

            if (is_array($result)) {
                $result = '('.implode(',', $result).')';
            }

            $query .= $result;
        }

        return $query;
    }

    protected function prependCall($function, $args, $prepend)
    {
        array_unshift($args, $prepend);

        return call_user_func_array($function, $args);
    }

    public function query()
    {
        $args = func_get_args();

        return $this->prependCall([$this, 'queryHelper'], $args, 'assoc');
    }

    public function queryAllLists()
    {
        $args = func_get_args();

        return $this->prependCall([$this, 'queryHelper'], $args, 'list');
    }

    public function queryFullColumns()
    {
        $args = func_get_args();

        return $this->prependCall([$this, 'queryHelper'], $args, 'full');
    }

    public function queryRaw()
    {
        $args = func_get_args();

        return $this->prependCall([$this, 'queryHelper'], $args, 'raw_buf');
    }

    public function queryRawUnbuf()
    {
        $args = func_get_args();

        return $this->prependCall([$this, 'queryHelper'], $args, 'raw_unbuf');
    }

    protected function queryHelper()
    {
        $args = func_get_args();
        $type = array_shift($args);
        $db = $this->get();

        $is_buffered = true;
        $row_type = 'assoc'; // assoc, list, raw
    $full_names = false;

        switch ($type) {
      case 'assoc':
        break;
      case 'list':
        $row_type = 'list';
        break;
      case 'full':
        $row_type = 'list';
        $full_names = true;
        break;
      case 'raw_buf':
        $row_type = 'raw';
        break;
      case 'raw_unbuf':
        $is_buffered = false;
        $row_type = 'raw';
        break;
      default:
        $this->nonSQLError('Error -- invalid argument to queryHelper!');
    }

        $sql = call_user_func_array([$this, 'parseQueryParams'], $args);

        if ($this->success_handler) {
            $starttime = microtime(true);
        }
        $result = $db->query($sql, $is_buffered ? MYSQLI_STORE_RESULT : MYSQLI_USE_RESULT);
        if ($this->success_handler) {
            $runtime = microtime(true) - $starttime;
        } else {
            $runtime = 0;
        }

    // ----- BEGIN ERROR HANDLING
    if (!$sql || $db->error) {
        if ($this->error_handler) {
            $error_handler = is_callable($this->error_handler) ? $this->error_handler : 'meekrodb_error_handler';

            call_user_func($error_handler, [
          'type'  => 'sql',
          'query' => $sql,
          'error' => $db->error,
          'code'  => $db->errno,
        ]);
        }

        if ($this->throw_exception_on_error) {
            $e = new MeekroDBException($db->error, $sql, $db->errno);
            throw $e;
        }
    } elseif ($this->success_handler) {
        $runtime = sprintf('%f', $runtime * 1000);
        $success_handler = is_callable($this->success_handler) ? $this->success_handler : 'meekrodb_debugmode_handler';

        call_user_func($success_handler, [
        'query'    => $sql,
        'runtime'  => $runtime,
        'affected' => $db->affected_rows,
      ]);
    }

    // ----- END ERROR HANDLING

    $this->insert_id = $db->insert_id;
        $this->affected_rows = $db->affected_rows;

    // mysqli_result->num_rows won't initially show correct results for unbuffered data
    if ($is_buffered && ($result instanceof MySQLi_Result)) {
        $this->num_rows = $result->num_rows;
    } else {
        $this->num_rows = null;
    }

        if ($row_type == 'raw' || !($result instanceof MySQLi_Result)) {
            return $result;
        }

        $return = [];

        if ($full_names) {
            $infos = [];
            foreach ($result->fetch_fields() as $info) {
                if (strlen($info->table)) {
                    $infos[] = $info->table.'.'.$info->name;
                } else {
                    $infos[] = $info->name;
                }
            }
        }

        while ($row = ($row_type == 'assoc' ? $result->fetch_assoc() : $result->fetch_row())) {
            if ($full_names) {
                $row = array_combine($infos, $row);
            }
            $return[] = $row;
        }

    // free results
    $result->free();
        while ($db->more_results()) {
            $db->next_result();
            if ($result = $db->use_result()) {
                $result->free();
            }
        }

        return $return;
    }

    public function queryOneRow()
    {
        $args = func_get_args();

        return call_user_func_array([$this, 'queryFirstRow'], $args);
    }

    public function queryFirstRow()
    {
        $args = func_get_args();
        $result = call_user_func_array([$this, 'query'], $args);
        if (!$result || !is_array($result)) {
            return;
        }

        return reset($result);
    }

    public function queryOneList()
    {
        $args = func_get_args();

        return call_user_func_array([$this, 'queryFirstList'], $args);
    }

    public function queryFirstList()
    {
        $args = func_get_args();
        $result = call_user_func_array([$this, 'queryAllLists'], $args);
        if (!$result || !is_array($result)) {
            return;
        }

        return reset($result);
    }

    public function queryFirstColumn()
    {
        $args = func_get_args();
        $results = call_user_func_array([$this, 'queryAllLists'], $args);
        $ret = [];

        if (!count($results) || !count($results[0])) {
            return $ret;
        }

        foreach ($results as $row) {
            $ret[] = $row[0];
        }

        return $ret;
    }

    public function queryOneColumn()
    {
        $args = func_get_args();
        $column = array_shift($args);
        $results = call_user_func_array([$this, 'query'], $args);
        $ret = [];

        if (!count($results) || !count($results[0])) {
            return $ret;
        }
        if ($column === null) {
            $keys = array_keys($results[0]);
            $column = $keys[0];
        }

        foreach ($results as $row) {
            $ret[] = $row[$column];
        }

        return $ret;
    }

    public function queryFirstField()
    {
        $args = func_get_args();
        $row = call_user_func_array([$this, 'queryFirstList'], $args);
        if ($row == null) {
            return;
        }

        return $row[0];
    }

    public function queryOneField()
    {
        $args = func_get_args();
        $column = array_shift($args);

        $row = call_user_func_array([$this, 'queryOneRow'], $args);
        if ($row == null) {
            return;
        } elseif ($column === null) {
            $keys = array_keys($row);
            $column = $keys[0];
        }

        return $row[$column];
    }
}

class WhereClause
{
    public $type = 'and'; //AND or OR
  public $negate = false;
    public $clauses = [];

    public function __construct($type)
    {
        $type = strtolower($type);
        if ($type !== 'or' && $type !== 'and') {
            DB::nonSQLError('you must use either WhereClause(and) or WhereClause(or)');
        }
        $this->type = $type;
    }

    public function add()
    {
        $args = func_get_args();
        $sql = array_shift($args);

        if ($sql instanceof self) {
            $this->clauses[] = $sql;
        } else {
            $this->clauses[] = ['sql' => $sql, 'args' => $args];
        }
    }

    public function negateLast()
    {
        $i = count($this->clauses) - 1;
        if (!isset($this->clauses[$i])) {
            return;
        }

        if ($this->clauses[$i] instanceof self) {
            $this->clauses[$i]->negate();
        } else {
            $this->clauses[$i]['sql'] = 'NOT ('.$this->clauses[$i]['sql'].')';
        }
    }

    public function negate()
    {
        $this->negate = !$this->negate;
    }

    public function addClause($type)
    {
        $r = new self($type);
        $this->add($r);

        return $r;
    }

    public function count()
    {
        return count($this->clauses);
    }

    public function textAndArgs()
    {
        $sql = [];
        $args = [];

        if (count($this->clauses) == 0) {
            return ['(1)', $args];
        }

        foreach ($this->clauses as $clause) {
            if ($clause instanceof self) {
                list($clause_sql, $clause_args) = $clause->textAndArgs();
            } else {
                $clause_sql = $clause['sql'];
                $clause_args = $clause['args'];
            }

            $sql[] = "($clause_sql)";
            $args = array_merge($args, $clause_args);
        }

        if ($this->type == 'and') {
            $sql = implode(' AND ', $sql);
        } else {
            $sql = implode(' OR ', $sql);
        }

        if ($this->negate) {
            $sql = '(NOT '.$sql.')';
        }

        return [$sql, $args];
    }

  // backwards compatability
  // we now return full WhereClause object here and evaluate it in preparseQueryParams
  public function text()
  {
      return $this;
  }
}

class DBTransaction
{
    private $committed = false;

    public function __construct()
    {
        DB::startTransaction();
    }

    public function __destruct()
    {
        if (!$this->committed) {
            DB::rollback();
        }
    }

    public function commit()
    {
        DB::commit();
        $this->committed = true;
    }
}

class MeekroDBException extends Exception
{
    protected $query = '';

    public function __construct($message = '', $query = '', $code = 0)
    {
        parent::__construct($message);
        $this->query = $query;
        $this->code = $code;
    }

    public function getQuery()
    {
        return $this->query;
    }
}

class DBHelper
{
    /*
    verticalSlice
    1. For an array of assoc rays, return an array of values for a particular key
    2. if $keyfield is given, same as above but use that hash key as the key in new array
  */

  public static function verticalSlice($array, $field, $keyfield = null)
  {
      $array = (array) $array;

      $R = [];
      foreach ($array as $obj) {
          if (!array_key_exists($field, $obj)) {
              die("verticalSlice: array doesn't have requested field\n");
          }

          if ($keyfield) {
              if (!array_key_exists($keyfield, $obj)) {
                  die("verticalSlice: array doesn't have requested field\n");
              }
              $R[$obj[$keyfield]] = $obj[$field];
          } else {
              $R[] = $obj[$field];
          }
      }

      return $R;
  }

  /*
    reIndex
    For an array of assoc rays, return a new array of assoc rays using a certain field for keys
  */

  public static function reIndex()
  {
      $fields = func_get_args();
      $array = array_shift($fields);
      $array = (array) $array;

      $R = [];
      foreach ($array as $obj) {
          $target = &$R;

          foreach ($fields as $field) {
              if (!array_key_exists($field, $obj)) {
                  die("reIndex: array doesn't have requested field\n");
              }

              $nextkey = $obj[$field];
              $target = &$target[$nextkey];
          }
          $target = $obj;
      }

      return $R;
  }
}

function meekrodb_error_handler($params)
{
    if (isset($params['query'])) {
        $out[] = 'QUERY: '.$params['query'];
    }
    if (isset($params['error'])) {
        $out[] = 'ERROR: '.$params['error'];
    }
    $out[] = '';

    if (php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
        echo implode("\n", $out);
    } else {
        echo implode("<br>\n", $out);
    }

    die;
}

function meekrodb_debugmode_handler($params)
{
    echo 'QUERY: '.$params['query'].' ['.$params['runtime'].' ms]';
    if (php_sapi_name() == 'cli' && empty($_SERVER['REMOTE_ADDR'])) {
        echo "\n";
    } else {
        echo "<br>\n";
    }
}

class MeekroDBEval
{
    public $text = '';

    public function __construct($text)
    {
        $this->text = $text;
    }
}
