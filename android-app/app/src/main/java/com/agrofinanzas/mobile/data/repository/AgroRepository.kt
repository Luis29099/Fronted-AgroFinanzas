package com.agrofinanzas.mobile.data.repository

import com.agrofinanzas.mobile.data.api.NetworkModule

class AgroRepository {
    suspend fun getProducts() = NetworkModule.api.getProducts()
    suspend fun getSummary(year: Int? = null) = NetworkModule.api.getSummary(year)
}
