<?php

namespace Safe;

use Safe\Exceptions\FannException;

/**
 * Creates a copy of a fann structure.
 *
 * @param resource $ann Neural network resource.
 * @return resource Returns a copy of neural network resource on success
 * @throws FannException
 *
 */
function fann_copy($ann)
{
    error_clear_last();
    $safeResult = \fann_copy($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a standard backpropagation neural network which is not fully connectected and has shortcut connections using an array of layers sizes.
 *
 * @param int $num_layers The total number of layers including the input and the output layer.
 * @param array $layers An array of layers sizes.
 * @return resource Returns a neural network resource on success.
 * @throws FannException
 *
 */
function fann_create_shortcut_array(int $num_layers, array $layers)
{
    error_clear_last();
    $safeResult = \fann_create_shortcut_array($num_layers, $layers);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a standard backpropagation neural network, which is not fully connected and which also has shortcut connections.
 *
 * Shortcut connections are connections that skip layers. A fully connected network with shortcut connections, is a network
 * where all neurons are connected to all neurons in later layers. Including direct connections from the input layer to the output layer.
 *
 * @param int $num_layers The total number of layers including the input and the output layer.
 * @param int $num_neurons1 Number of neurons in the first layer.
 * @param int $num_neurons2 Number of neurons in the second layer.
 * @param int $num_neuronsN Number of neurons in other layers.
 * @return reference Returns a neural network resource on success.
 * @throws FannException
 *
 */
function fann_create_shortcut(int $num_layers, int $num_neurons1, int $num_neurons2, int ...$num_neuronsN): reference
{
    error_clear_last();
    if ($num_neuronsN !== []) {
        $safeResult = \fann_create_shortcut($num_layers, $num_neurons1, $num_neurons2, ...$num_neuronsN);
    } else {
        $safeResult = \fann_create_shortcut($num_layers, $num_neurons1, $num_neurons2);
    }
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a standard backpropagation neural network, which is not fully connected using an array of layer sizes.
 *
 * @param float $connection_rate The connection rate controls how many connections there will be in the network. If the connection rate
 * is set to 1, the network will be fully connected, but if it is set to 0.5 only half of the connections
 * will be set. A connection rate of 1 will yield the same result as fann_create_standard.
 * @param int $num_layers The total number of layers including the input and the output layer.
 * @param array $layers An array of layer sizes.
 * @return resource Returns a neural network resource on success.
 * @throws FannException
 *
 */
function fann_create_sparse_array(float $connection_rate, int $num_layers, array $layers)
{
    error_clear_last();
    $safeResult = \fann_create_sparse_array($connection_rate, $num_layers, $layers);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a standard backpropagation neural network, which is not fully connected.
 *
 * @param float $connection_rate The connection rate controls how many connections there will be in the network. If the connection rate
 * is set to 1, the network will be fully connected, but if it is set to 0.5 only half of the connections
 * will be set. A connection rate of 1 will yield the same result as fann_create_standard.
 * @param int $num_layers The total number of layers including the input and the output layer.
 * @param int $num_neurons1 Number of neurons in the first layer.
 * @param int $num_neurons2 Number of neurons in the second layer.
 * @param int $num_neuronsN Number of neurons in other layers.
 * @return resource Returns a neural network resource on success.
 * @throws FannException
 *
 */
function fann_create_sparse(float $connection_rate, int $num_layers, int $num_neurons1, int $num_neurons2, int ...$num_neuronsN)
{
    error_clear_last();
    if ($num_neuronsN !== []) {
        $safeResult = \fann_create_sparse($connection_rate, $num_layers, $num_neurons1, $num_neurons2, ...$num_neuronsN);
    } else {
        $safeResult = \fann_create_sparse($connection_rate, $num_layers, $num_neurons1, $num_neurons2);
    }
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a standard fully connected backpropagation neural network.
 *
 * There will be a bias neuron in each layer (except the output layer),
 * and this bias neuron will be connected to all neurons in the next layer.
 * When running the network, the bias nodes always emits 1.
 *
 * To destroy a neural network use the fann_destroy function.
 *
 * @param int $num_layers The total number of layers including the input and the output layer.
 * @param array $layers An array of layer sizes.
 * @return resource Returns a neural network resource on success.
 * @throws FannException
 *
 */
function fann_create_standard_array(int $num_layers, array $layers)
{
    error_clear_last();
    $safeResult = \fann_create_standard_array($num_layers, $layers);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Creates a standard fully connected backpropagation neural network.
 *
 * There will be a bias neuron in each layer (except the output layer),
 * and this bias neuron will be connected to all neurons in the next layer.
 * When running the network, the bias nodes always emits 1.
 *
 * To destroy a neural network use the fann_destroy function.
 *
 * @param int $num_layers The total number of layers including the input and the output layer.
 * @param int $num_neurons1 Number of neurons in the first layer.
 * @param int $num_neurons2 Number of neurons in the second layer.
 * @param int $num_neuronsN Number of neurons in other layers.
 * @return resource Returns a neural network resource on success.
 * @throws FannException
 *
 */
function fann_create_standard(int $num_layers, int $num_neurons1, int $num_neurons2, int ...$num_neuronsN)
{
    error_clear_last();
    if ($num_neuronsN !== []) {
        $safeResult = \fann_create_standard($num_layers, $num_neurons1, $num_neurons2, ...$num_neuronsN);
    } else {
        $safeResult = \fann_create_standard($num_layers, $num_neurons1, $num_neurons2);
    }
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the activation function for neuron number neuron in layer number
 * layer, counting the input layer as layer 0.
 *
 * It is not possible to get activation functions for the neurons in the input layer.
 *
 * The return value is one of the activation functions constants.
 *
 * @param resource $ann Neural network resource.
 * @param int $layer Layer number.
 * @param int $neuron Neuron number.
 * @return int Learning functions constant or -1
 * if the neuron is not defined in the neural network.
 * @throws FannException
 *
 */
function fann_get_activation_function($ann, int $layer, int $neuron): int
{
    error_clear_last();
    $safeResult = \fann_get_activation_function($ann, $layer, $neuron);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the activation steepness for neuron number neuron in layer number
 * layer, counting the input layer as layer 0.
 *
 * It is not possible to get activation steepness for the neurons in the input layer.
 *
 * The steepness of an activation function says something about how fast the activation function goes
 * from the minimum to the maximum.  A high value for the activation function will also give a more aggressive training.
 *
 * When training neural networks where the output values should be at the extremes
 * (usually 0 and 1, depending on the activation function), a steep activation function can be used (e.g.  1.0).
 *
 * The default activation steepness is 0.5.
 *
 * @param resource $ann Neural network resource.
 * @param int $layer Layer number
 * @param int $neuron Neuron number
 * @return float The activation steepness for the neuron or -1 if the neuron is not defined in the neural network.
 * @throws FannException
 *
 */
function fann_get_activation_steepness($ann, int $layer, int $neuron): float
{
    error_clear_last();
    $safeResult = \fann_get_activation_steepness($ann, $layer, $neuron);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the bit fail limit used during training.
 *
 * The bit fail limit is used during training where the stop function
 * is set to FANN_STOPFUNC_BIT.
 *
 * The limit is the maximum accepted difference between the desired output and the actual output during training.
 * Each output that diverges more than this limit is counted as an error bit. This difference is divided by two
 * when dealing with symmetric activation functions, so that symmetric and not symmetric activation functions
 * can use the same limit.
 *
 * The default bit fail limit is 0.35.
 *
 * @param resource $ann Neural network resource.
 * @return float The bit fail limit.
 * @throws FannException
 *
 */
function fann_get_bit_fail_limit($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_bit_fail_limit($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The number of fail bits; means the number of output neurons which differ more than the bit fail limit
 * (see fann_get_bit_fail_limit, fann_set_bit_fail_limit).
 * The bits are counted in all of the training data, so this number can be higher than the number of training data.
 *
 * This value is reset by fann_reset_MSE and updated by all the same functions
 * which also updates the MSE value (e.g. fann_test_data, fann_train_epoch)
 *
 * @param resource $ann Neural network resource.
 * @return int The number of bits fail.
 * @throws FannException
 *
 */
function fann_get_bit_fail($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_bit_fail($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The number of activation functions in the fann_get_cascade_activation_functions array.
 *
 * The default number of activation functions is 6.
 *
 * @param resource $ann Neural network resource.
 * @return int The number of cascade activation functions.
 * @throws FannException
 *
 */
function fann_get_cascade_activation_functions_count($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_activation_functions_count($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cascade activation functions array is an array of the different activation functions used by the candidates
 *
 * See fann_get_cascade_num_candidates for a description of which candidate neurons will be generated by this array.
 *
 * The default activation functions are FANN_SIGMOID, FANN_SIGMOID_SYMMETRIC,
 * FANN_GAUSSIAN, FANN_GAUSSIAN_SYMMETRIC, FANN_ELLIOT,
 * FANN_ELLIOT_SYMMETRIC.
 *
 * @param resource $ann Neural network resource.
 * @return array The cascade activation functions.
 * @throws FannException
 *
 */
function fann_get_cascade_activation_functions($ann): array
{
    error_clear_last();
    $safeResult = \fann_get_cascade_activation_functions($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The number of activation steepnesses in the fann_get_cascade_activation_functions array.
 *
 * The default number of activation steepnesses is 4.
 *
 * @param resource $ann Neural network resource.
 * @return int The number of activation steepnesses.
 * @throws FannException
 *
 */
function fann_get_cascade_activation_steepnesses_count($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_activation_steepnesses_count($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cascade activation steepnesses array is an array of the different activation functions used by the candidates.
 *
 * See fann_get_cascade_num_candidates for a description of which candidate neurons will be generated by this array.
 *
 * The default activation steepnesses are {0.25, 0.50, 0.75, 1.00}.
 *
 * @param resource $ann Neural network resource.
 * @return array The cascade activation steepnesses.
 * @throws FannException
 *
 */
function fann_get_cascade_activation_steepnesses($ann): array
{
    error_clear_last();
    $safeResult = \fann_get_cascade_activation_steepnesses($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cascade candidate change fraction is a number between 0 and 1 determining how large a fraction the fann_get_MSE
 * value should change within fann_get_cascade_candidate_stagnation_epochs during training of the candidate neurons,
 * in order for the training not to stagnate. If the training stagnates, the training of the candidate neurons will be ended
 * and the best candidate will be selected.
 *
 * It means that if the MSE does not change by a fraction of fann_get_cascade_candidate_change_fraction during
 * a period of fann_get_cascade_candidate_stagnation_epochs, the training of the candidate neurons is stopped
 * because the training has stagnated.
 *
 * If the cascade candidate change fraction is low, the candidate neurons will be trained more and if the fraction is high they will be trained less.
 *
 * The default cascade candidate change fraction is 0.01, which is equalent to a 1% change in MSE.
 *
 * @param resource $ann Neural network resource.
 * @return float The cascade candidate change fraction.
 * @throws FannException
 *
 */
function fann_get_cascade_candidate_change_fraction($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_cascade_candidate_change_fraction($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The candidate limit is a limit for how much the candidate neuron may be trained. The limit is a limit
 * on the proportion between the MSE and candidate score.
 *
 * Set this to a lower value to avoid overfitting and to a higher if overfitting is not a problem.
 *
 * The default candidate limit is 1000.0.
 *
 * @param resource $ann Neural network resource.
 * @return float The candidate limit.
 * @throws FannException
 *
 */
function fann_get_cascade_candidate_limit($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_cascade_candidate_limit($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The number of cascade candidate stagnation epochs determines the number of epochs training is allowed to continue
 * without changing the MSE by a fraction of fann_get_cascade_candidate_change_fraction.
 *
 * See more info about this parameter in fann_get_cascade_candidate_change_fraction.
 *
 * The default number of cascade candidate stagnation epochs is 12.
 *
 * @param resource $ann Neural network resource.
 * @return float The number of cascade candidate stagnation epochs.
 * @throws FannException
 *
 */
function fann_get_cascade_candidate_stagnation_epochs($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_cascade_candidate_stagnation_epochs($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The maximum candidate epochs determines the maximum number of epochs the input connections
 * to the candidates may be trained before adding a new candidate neuron.
 *
 * The default max candidate epochs is 150.
 *
 * @param resource $ann Neural network resource.
 * @return int The maximum candidate epochs.
 * @throws FannException
 *
 */
function fann_get_cascade_max_cand_epochs($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_max_cand_epochs($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The maximum out epochs determines the maximum number of epochs the output connections may be
 * trained after adding a new candidate neuron.
 *
 * The default max out epochs is 150.
 *
 * @param resource $ann Neural network resource.
 * @return int The maximum out epochs.
 * @throws FannException
 *
 */
function fann_get_cascade_max_out_epochs($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_max_out_epochs($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The minimum candidate epochs determines the minimum number of epochs the input connections
 * to the candidates may be trained before adding a new candidate neuron.
 *
 * The default min candidate epochs is 50.
 *
 * @param resource $ann Neural network resource.
 * @return int The minimum candidate epochs.
 * @throws FannException
 *
 */
function fann_get_cascade_min_cand_epochs($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_min_cand_epochs($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The minimum out epochs determines the minimum number of epochs the output connections must be trained
 * after adding a new candidate neuron.
 *
 * The default min out epochs is 50.
 *
 * @param resource $ann Neural network resource.
 * @return int The minimum out epochs.
 * @throws FannException
 *
 */
function fann_get_cascade_min_out_epochs($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_min_out_epochs($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The number of candidate groups is the number of groups of identical candidates which will be used during training.
 *
 * This number can be used to have more candidates without having to define new parameters for the candidates.
 *
 * See fann_get_cascade_num_candidates for a description of
 * which candidate neurons will be generated by this parameter.
 *
 * The default number of candidate groups is 2.
 *
 * @param resource $ann Neural network resource.
 * @return int The number of candidate groups.
 * @throws FannException
 *
 */
function fann_get_cascade_num_candidate_groups($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_num_candidate_groups($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The number of candidates used during training (calculated by multiplying
 * fann_get_cascade_activation_functions_count,
 * fann_get_cascade_activation_steepnesses_count and
 * fann_get_cascade_num_candidate_groups).
 *
 * The actual candidates is defined by the fann_get_cascade_activation_functions and
 * fann_get_cascade_activation_steepnesses arrays. These arrays define the activation functions and
 * activation steepnesses used for the candidate neurons. If there are 2 activation functions in the activation function array and
 * 3 steepnesses in the steepness array, then there will be 2x3=6 different candidates which will be trained. These 6 different
 * candidates can be copied into several candidate groups, where the only difference between these groups is the initial weights.
 * If the number of groups is set to 2, then the number of candidate neurons will be 2x3x2=12.
 * The number of candidate groups is defined by fann_set_cascade_num_candidate_groups.
 *
 * The default number of candidates is 6x4x2 = 48
 *
 * @param resource $ann Neural network resource.
 * @return int The number of candidates used during training.
 * @throws FannException
 *
 */
function fann_get_cascade_num_candidates($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_num_candidates($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The cascade output change fraction is a number between 0 and 1 determining how large a fraction of the fann_get_MSE
 * value should change within fann_get_cascade_output_stagnation_epochs during training of the output connections,
 * in order for the training not to stagnate. If the training stagnates, the training of the output connections
 * will be ended and new candidates will be prepared.
 *
 * It means that if the MSE does not change by a fraction of fann_get_cascade_output_change_fraction during
 * a period of fann_get_cascade_output_stagnation_epochs, the training of the output connections is
 * stopped because the training has stagnated.
 *
 * If the cascade output change fraction is low, the output connections will be trained more and if the fraction is high,
 * they will be trained less.
 *
 * The default cascade output change fraction is 0.01, which is equalent to a 1% change in MSE.
 *
 * @param resource $ann Neural network resource.
 * @return float The cascade output change fraction.
 * @throws FannException
 *
 */
function fann_get_cascade_output_change_fraction($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_cascade_output_change_fraction($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The number of cascade output stagnation epochs determines the number of epochs training is allowed to continue
 * without changing the MSE by a fraction of fann_get_cascade_output_change_fraction.
 *
 * See more info about this parameter in fann_get_cascade_output_change_fraction.
 *
 * The default number of cascade output stagnation epochs is 12.
 *
 * @param resource $ann Neural network resource.
 * @return int The number of cascade output stagnation epochs.
 * @throws FannException
 *
 */
function fann_get_cascade_output_stagnation_epochs($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_cascade_output_stagnation_epochs($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The weight multiplier is a parameter which is used to multiply the weights from the candidate neuron before adding
 * the neuron to the neural network. This parameter is usually between 0 and 1, and is used to make the training a bit less aggressive.
 *
 * The default weight multiplier is 0.4.
 *
 * @param resource $ann Neural network resource.
 * @return float The weight multiplier.
 * @throws FannException
 *
 */
function fann_get_cascade_weight_multiplier($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_cascade_weight_multiplier($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the connection rate used when the network was created.
 *
 * @param resource $ann Neural network resource.
 * @return float The connection rate used when the network was created.
 * @throws FannException
 *
 */
function fann_get_connection_rate($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_connection_rate($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the last error number.
 *
 * @param resource $errdat Either neural network resource or neural network trainining data resource.
 * @return int The error number.
 * @throws FannException
 *
 */
function fann_get_errno($errdat): int
{
    error_clear_last();
    $safeResult = \fann_get_errno($errdat);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the last errstr.
 *
 * @param resource $errdat Either neural network resource or neural network trainining data resource.
 * @return string The last error string.
 * @throws FannException
 *
 */
function fann_get_errstr($errdat): string
{
    error_clear_last();
    $safeResult = \fann_get_errstr($errdat);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The learning momentum can be used to speed up FANN_TRAIN_INCREMENTAL training.
 * A too high momentum will however not benefit training. Setting momentum to 0 will be the same as
 * not using the momentum parameter. The recommended value of this parameter is between 0.0 and 1.0.
 *
 * The default momentum is 0.
 *
 * @param resource $ann Neural network resource.
 * @return float Returns TRUE.
 *
 * The learning momentum.
 * @throws FannException
 *
 */
function fann_get_learning_momentum($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_learning_momentum($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The learning rate is used to determine how aggressive training should be for some of the training algorithms
 * (FANN_TRAIN_INCREMENTAL, FANN_TRAIN_BATCH, FANN_TRAIN_QUICKPROP).
 * Do however note that it is not used in FANN_TRAIN_RPROP.
 *
 * The default learning rate is 0.7.
 *
 * @param resource $ann Neural network resource.
 * @return float The learning rate.
 * @throws FannException
 *
 */
function fann_get_learning_rate($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_learning_rate($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Reads the mean square error from the network.
 *
 * Reads the mean square error from the network. This value is calculated during training or testing and can therefore
 * sometimes be a bit off if the weights have been changed since the last calculation of the value.
 *
 * @param resource $ann Neural network resource.
 * @return float The mean square error.
 * @throws FannException
 *
 */
function fann_get_MSE($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_MSE($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the type of neural network it was created as.
 *
 * @param resource $ann Neural network resource.
 * @return int Network type constant.
 * @throws FannException
 *
 */
function fann_get_network_type($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_network_type($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the number of input neurons.
 *
 * @param resource $ann Neural network resource.
 * @return int Number of input neurons
 * @throws FannException
 *
 */
function fann_get_num_input($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_num_input($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the number of layers in the neural network.
 *
 * @param resource $ann Neural network resource.
 * @return int The number of leayers in the neural network.
 * @throws FannException
 *
 */
function fann_get_num_layers($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_num_layers($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the number of output neurons.
 *
 * @param resource $ann Neural network resource.
 * @return int Number of output neurons
 * @throws FannException
 *
 */
function fann_get_num_output($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_num_output($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The decay is a small negative valued number which is a factor that the weights should decrease in each iteration
 * during quickprop training. This is used to make sure that the weights do not become too high during training.
 *
 * The default decay is -0.0001.
 *
 * @param resource $ann Neural network resource.
 * @return float The decay.
 * @throws FannException
 *
 */
function fann_get_quickprop_decay($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_quickprop_decay($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The mu factor is used to increase and decrease the step-size during quickprop training. The mu factor should always be above 1,
 * since it would otherwise decrease the step-size when it was suppose to increase it.
 *
 * The default mu factor is 1.75.
 *
 * @param resource $ann Neural network resource.
 * @return float The mu factor.
 * @throws FannException
 *
 */
function fann_get_quickprop_mu($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_quickprop_mu($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The decrease factor is a value smaller than 1, which is used to decrease the step-size during RPROP training.
 *
 * The default decrease factor is 0.5.
 *
 * @param resource $ann Neural network resource.
 * @return float The decrease factor.
 * @throws FannException
 *
 */
function fann_get_rprop_decrease_factor($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_rprop_decrease_factor($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The maximum step-size is a positive number determining how large the maximum step-size may be.
 *
 * The default delta max is 50.0.
 *
 * @param resource $ann Neural network resource.
 * @return float The maximum step-size.
 * @throws FannException
 *
 */
function fann_get_rprop_delta_max($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_rprop_delta_max($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The minimum step-size is a small positive number determining how small the minimum step-size may be.
 *
 * The default value delta min is 0.0.
 *
 * @param resource $ann Neural network resource.
 * @return float The minimum step-size.
 * @throws FannException
 *
 */
function fann_get_rprop_delta_min($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_rprop_delta_min($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The initial step-size is a positive number determining the initial step size.
 *
 * The default delta zero is 0.1.
 *
 * @param resource $ann Neural network resource.
 * @return float The initial step-size.
 * @throws FannException
 *
 */
function fann_get_rprop_delta_zero($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_rprop_delta_zero($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The increase factor is a value larger than 1, which is used to increase the step-size during RPROP training.
 *
 * The default increase factor is 1.2.
 *
 * @param resource $ann Neural network resource.
 * @return float The increase factor.
 * @throws FannException
 *
 */
function fann_get_rprop_increase_factor($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_rprop_increase_factor($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the sarprop step error shift.
 *
 * The default step error shift is 1.385.
 *
 * @param resource $ann Neural network resource.
 * @return float The sarprop step error shift.
 * @throws FannException
 *
 */
function fann_get_sarprop_step_error_shift($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_sarprop_step_error_shift($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The sarprop step error threshold factor.
 *
 * The default factor is 0.1.
 *
 * @param resource $ann Neural network resource.
 * @return float The sarprop step error threshold factor.
 * @throws FannException
 *
 */
function fann_get_sarprop_step_error_threshold_factor($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_sarprop_step_error_threshold_factor($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the sarprop temperature.
 *
 * The default temperature is 0.015.
 *
 * @param resource $ann Neural network resource.
 * @return float The sarprop temperature.
 * @throws FannException
 *
 */
function fann_get_sarprop_temperature($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_sarprop_temperature($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * The sarprop weight decay shift.
 *
 * The default delta max is -6.644.
 *
 * @param resource $ann Neural network resource.
 * @return float The sarprop weight decay shift.
 * @throws FannException
 *
 */
function fann_get_sarprop_weight_decay_shift($ann): float
{
    error_clear_last();
    $safeResult = \fann_get_sarprop_weight_decay_shift($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the total number of connections in the entire network.
 *
 * @param resource $ann Neural network resource.
 * @return int Total number of connections in the entire network
 * @throws FannException
 *
 */
function fann_get_total_connections($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_total_connections($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Get the total number of neurons in the entire network. This number does also include the bias neurons,
 * so a 2-4-2 network has 2+4+2 +2(bias) = 10 neurons.
 *
 * @param resource $ann Neural network resource.
 * @return int Total number of neurons in the entire network.
 * @throws FannException
 *
 */
function fann_get_total_neurons($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_total_neurons($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the error function used during training.
 *
 * The error functions are described further in error functions constants.
 *
 * The default error function is FANN_ERRORFUNC_TANH.
 *
 * @param resource $ann Neural network resource.
 * @return int The error function constant.
 * @throws FannException
 *
 */
function fann_get_train_error_function($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_train_error_function($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the stop function used during training.
 *
 * The stop functions are described further in stop functions constants.
 *
 * The default stop function is FANN_STOPFUNC_MSE.
 *
 * @param resource $ann Neural network resource.
 * @return int The stop function constant.
 * @throws FannException
 *
 */
function fann_get_train_stop_function($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_train_stop_function($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the training algorithm. This training algorithm is used by fann_train_on_data and associated functions.
 *
 * Note that this algorithm is also used during fann_cascadetrain_on_data, although only
 * FANN_TRAIN_RPROP and FANN_TRAIN_QUICKPROP is allowed during cascade training.
 *
 * @param resource $ann Neural network resource.
 * @return int Training algorithm constant.
 * @throws FannException
 *
 */
function fann_get_training_algorithm($ann): int
{
    error_clear_last();
    $safeResult = \fann_get_training_algorithm($ann);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the number of training patterns in the train data resource.
 *
 * @param resource $data Neural network training data resource.
 * @return int Number of elements in the train data resource.
 * @throws FannException
 *
 */
function fann_length_train_data($data): int
{
    error_clear_last();
    $safeResult = \fann_length_train_data($data);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Merges the data from data1 and data2 into a new train data resource.
 *
 * @param resource $data1 Neural network training data resource.
 * @param resource $data2 Neural network training data resource.
 * @return resource New merged train data resource.
 * @throws FannException
 *
 */
function fann_merge_train_data($data1, $data2)
{
    error_clear_last();
    $safeResult = \fann_merge_train_data($data1, $data2);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the number of inputs in each of the training patterns in the train data resource.
 *
 * @param resource $data Neural network training data resource.
 * @return int The number of inputs.
 * @throws FannException
 *
 */
function fann_num_input_train_data($data): int
{
    error_clear_last();
    $safeResult = \fann_num_input_train_data($data);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Returns the number of outputs in each of the training patterns in the train data resource.
 *
 * @param resource $data Neural network training data resource.
 * @return int The number of outputs.
 * @throws FannException
 *
 */
function fann_num_output_train_data($data): int
{
    error_clear_last();
    $safeResult = \fann_num_output_train_data($data);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Will run input through the neural network, returning an array of outputs, the number of which being equal
 * to the number of neurons in the output layer.
 *
 * @param resource $ann Neural network resource.
 * @param array $input Array of input values
 * @return array Array of output values
 * @throws FannException
 *
 */
function fann_run($ann, array $input): array
{
    error_clear_last();
    $safeResult = \fann_run($ann, $input);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Test a set of training data and calculates the MSE for the training data.
 *
 * This function updates the MSE and the bit fail values.
 *
 * @param resource $ann Neural network resource.
 * @param resource $data Neural network training data resource.
 * @return float The updated MSE.
 * @throws FannException
 *
 */
function fann_test_data($ann, $data): float
{
    error_clear_last();
    $safeResult = \fann_test_data($ann, $data);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}


/**
 * Test with a set of inputs, and a set of desired outputs. This operation updates the mean square error,
 * but does not change the network in any way.
 *
 * @param resource $ann Neural network resource.
 * @param array $input An array of inputs. This array must be exactly fann_get_num_input long.
 * @param array $desired_output An array of desired outputs. This array must be exactly fann_get_num_output long.
 * @throws FannException
 *
 */
function fann_test($ann, array $input, array $desired_output): void
{
    error_clear_last();
    $safeResult = \fann_test($ann, $input, $desired_output);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
}


/**
 * Train one epoch with the training data stored in data. One epoch is
 * where all of the training data is considered exactly once.
 *
 * This function returns the MSE error as it is calculated either before or during the actual training.
 * This is not the actual MSE after the training epoch, but since calculating this will require to go
 * through the entire training set once more. It is more than adequate to use this value during training.
 *
 * The training algorithm used by this function is chosen by fann_set_training_algorithm
 * function.
 *
 * @param resource $ann Neural network resource.
 * @param resource $data Neural network training data resource.
 * @return float The MSE.
 * @throws FannException
 *
 */
function fann_train_epoch($ann, $data): float
{
    error_clear_last();
    $safeResult = \fann_train_epoch($ann, $data);
    if ($safeResult === false) {
        throw FannException::createFromPhpError();
    }
    return $safeResult;
}
