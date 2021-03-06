<?php
require __DIR__ . '/vendor/autoload.php';

$double = Mockery::mock();
class Book {}

interface BookRepository {
    function find($id): Book;
    function findAll(): array;
    function add(Book $book): void;
}

$double = Mockery::mock(BookRepository::class);

$double->allows()->find(123)->andReturns(new Book());

$book = $double->find(123);
$double->shouldReceive('find')->with(123)->andReturn(new Book());
$book = $double->find(123);

$book = new Book();

$double = Mockery::mock(BookRepository::class);
$double->expects()->add($book);

$double->shouldReceive('find')
    ->with(123)
    ->once()
    ->andReturn(new Book());
$book = $double->find(123);

// $double = Mockery::mock()->shouldIgnoreMissing();
$double = Mockery::spy();

$double->foo(); // null
$double->bar(); // null

trait Foo {
    function foo() {
        return $this->doFoo();
    }

    abstract function doFoo();
}

$double = Mockery::mock(Foo::class);
$double->allows()->doFoo()->andReturns(123);
$double->foo(); // int(123)

$implementationMock = Mockery::mock('overload:\Some\Implementation');

$implementationMock->shouldReceive('__construct')
    ->once()
    ->with(['host' => 'localhost']);
// add other expectations as usual

$implementation = new \Some\Implementation(['host' => 'localhost']);

//
?>
