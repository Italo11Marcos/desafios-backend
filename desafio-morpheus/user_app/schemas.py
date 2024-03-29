from typing import List, Optional
from pydantic import BaseModel


class UserBase(BaseModel):
    name: str

class UserCreate(UserBase):
    pass

class User(UserBase):
    id: int
    name: str

    class Config:
        orm_mode = True
