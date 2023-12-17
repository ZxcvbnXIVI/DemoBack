<?php
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * @OA\Info(title="Swagger API", version="1.0")
 */

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    /**
     * @OA\Get(
     *     path="/hello/{name}",
     *     tags={"greeting"},
     *     summary="Greet a person",
     *     description="Returns a greeting message",
     *     @OA\Parameter(
     *         name="name",
     *         in="path",
     *         required=true,
     *         description="The name of the person to greet",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Hello, John")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Person not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Person not found")
     *         )
     *     )
     * )
     */
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
