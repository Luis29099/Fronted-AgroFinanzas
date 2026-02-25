package com.agrofinanzas.mobile.data.api

import com.agrofinanzas.mobile.data.model.LoginRequest
import com.agrofinanzas.mobile.data.model.LoginResponse
import com.agrofinanzas.mobile.data.model.ProductsResponse
import com.agrofinanzas.mobile.data.model.SummaryResponse
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Query

interface AgroApiService {

    @POST("login")
    suspend fun login(@Body request: LoginRequest): LoginResponse

    @GET("agro/products")
    suspend fun getProducts(): ProductsResponse

    @GET("agro/summary")
    suspend fun getSummary(@Query("year") year: Int? = null): SummaryResponse
}
