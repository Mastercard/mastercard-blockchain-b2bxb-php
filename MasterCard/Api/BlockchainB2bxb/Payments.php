<?php
/*
 * Copyright 2016 MasterCard International.
 *
 * Redistribution and use in source and binary forms, with or without modification, are
 * permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list of
 * conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 * Neither the name of the MasterCard International Incorporated nor the names of its
 * contributors may be used to endorse or promote products derived from this software
 * without specific prior written permission.
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES
 * OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT
 * SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
 * TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS;
 * OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER
 * IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING
 * IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
 * SUCH DAMAGE.
 *
 */

 namespace MasterCard\Api\BlockchainB2bxb;

 use MasterCard\Core\Model\BaseObject;
 use MasterCard\Core\Model\RequestMap;
 use MasterCard\Core\Model\OperationMetadata;
 use MasterCard\Core\Model\OperationConfig;


/**
 * 
 */
class Payments extends BaseObject {



	protected static function getOperationConfig($operationUUID) {
		switch ($operationUUID) {
			case "c7e6250f-b3d6-4596-a4f3-f0e7b2afce66":
				return new OperationConfig("/labs/proxy/blockchain/b2bxb/api/v1/payments", "list", array("status"), array());
			case "6dbda2d3-cf0a-4cfb-80c6-340e07a5cba0":
				return new OperationConfig("/labs/proxy/blockchain/b2bxb/api/v1/payments", "create", array(), array());
			case "27573962-71e9-47fe-8c6e-987724240c64":
				return new OperationConfig("/labs/proxy/blockchain/b2bxb/api/v1/payments/{reference}", "read", array(), array());
			
			default:
				throw new \Exception("Invalid operationUUID supplied: $operationUUID");
		}
	}

	protected static function getOperationMetadata() {
		$config = ResourceConfig::getInstance();
		return new OperationMetadata($config->getVersion(), $config->getHost(), $config->getContext(), $config->getJsonNative());
	}




	/**
	 * List objects of type Payments
	 *
	 * @param Map criteria
	 *
	 * @throws ApiException - which encapsulates the http status code and the error return by the server
	 *
	 * @return Array of Payments object matching the criteria.
	 */
	public static function listByCriteria($criteria = null)
	{
		if ($criteria == null) {
			return self::execute("c7e6250f-b3d6-4596-a4f3-f0e7b2afce66",new Payments());
		} else {
			return self::execute("c7e6250f-b3d6-4596-a4f3-f0e7b2afce66",new Payments($criteria));
		}

	}



   /**
	* Creates object of type Payments
	*
	* @param Map map, containing the required parameters to create a new object
	* @return Payments of the response of created instance.
	*/
	public static function create($map)
	{
		return self::execute("6dbda2d3-cf0a-4cfb-80c6-340e07a5cba0", new Payments($map));
	}









	/**
	 * Returns objects of type Payments by id and optional criteria
	 * @param type $id
	 * @param type $criteria
	 *
	 * @throws ApiException - which encapsulates the http status code and the error return by the server
	 *
	 * @return Payments of the response
	 */
	public static function read($id, $criteria = null)
	{
		$map = new RequestMap();
		if (!empty($id)) {
			$map->set("id", $id);
		}
		if ($criteria != null) {
			$map->setAll($criteria);
		}
		return self::execute("27573962-71e9-47fe-8c6e-987724240c64",new Payments($map));
	}



}

