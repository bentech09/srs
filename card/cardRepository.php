<?php

/** @package  */
class cardRepository
{

    private query $query;
    public function __construct(query $query)
    {
        $this->query = $query;
    }

    /**
     * @param mixed $data 
     * @return bool 
     * The INSERT statement is used to insert new rows into an existing table. The INSERT ... VALUES
     * and INSERT ... SET forms of the statement insert rows based on explicitly specified values.
     */
    public function createCard($data): bool
    {
        return $this->query->execute("INSERT INTO cards (question, answer) VALUES (?, ?)", [$data['question'], $data['answer']]);
    }

    /** 
     * @return array  
     * SELECT is used to retrieve rows selected from one or more tables.
     * * to select all columns from all tables in the FROM clause.
     */
    public function listAllCards(): array
    {
        return $this->query->execute("SELECT * FROM cards");
    }

    /**
     * @param mixed $data 
     * @return bool 
     * For the single-table syntax, the UPDATE statement updates columns of existing rows in the named table with new values.
     * The SET clause indicates which columns to modify and the values they should be given.
     * Each value can be given as an expression, or the keywordDEFAULT to set a column explicitly to its default value.
     * The WHERE clause, if given, specifies the conditions that identify which rows to update. With no WHERE clause, all rows are updated.
     */
    public function updateCard($data): bool
    {
        return $this->query->execute("UPDATE cards SET question = ?,  answer = ? WHERE id = ?", [$data['question'], $data['answer'], $data['id']]);
    }

    /**
     * @param mixed $data 
     * @return bool 
     * For the single-table syntax, the DELETE statement deletes rows from tbl_name and returns a count of the number of deleted rows.
     */
    public function deleteCard($id): bool
    {
        return $this->query->execute("DELETE FROM cards WHERE id = ?", [$id['id']]);
    }
}
